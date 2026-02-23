<?php

namespace App\Http\Controllers;

use App\Models\Rotation;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['rotations.section'])->latest()->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $departments = Section::all();
        return view('students.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            $student = Student::create(['name' => $request->name]);

            $availableSection = Section::all()->filter(function ($section) {
                $currentCount = Rotation::where('section_id', $section->id)
                    ->where('is_active', true)
                    ->count();
                return $currentCount < $section->capacity;
            })->first();

            if ($availableSection) {
                Rotation::create([
                    'student_id' => $student->id,
                    'section_id' => $availableSection->id,
                    'start_date' => now()->startOfMonth(),
                    'end_date' => now()->endOfMonth(),
                    'is_active' => true,
                ]);
            }
        });

        return redirect()->route('students.index')->with('success', 'تم إضافة الطالب وتوزيعه حسب السعة المتاحة.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'تم حذف الطالب من النظام.');
    }

    public function generateMonthlyRotations()
    {
        $students = Student::all();
        $sections = Section::all();

        DB::transaction(function () use ($students, $sections) {
            Rotation::where('is_active', true)->update(['is_active' => false]);

            $counts = [];
            foreach ($sections as $sec) {
                $counts[$sec->id] = 0;
            }

            foreach ($students as $student) {
                $visitedIds = Rotation::where('student_id', $student->id)
                    ->pluck('section_id')
                    ->toArray();

                $targetSection = $sections->filter(function ($section) use ($visitedIds, $counts) {
                    return !in_array($section->id, $visitedIds) && $counts[$section->id] < $section->capacity;
                })->first();

                if (!$targetSection) {
                    $targetSection = $sections->filter(function ($section) use ($counts) {
                        return $counts[$section->id] < $section->capacity;
                    })->first();
                }

                if ($targetSection) {
                    Rotation::create([
                        'student_id' => $student->id,
                        'section_id' => $targetSection->id,
                        'start_date' => now()->addMonth()->startOfMonth(),
                        'end_date' => now()->addMonth()->endOfMonth(),
                        'is_active' => true,
                    ]);
                    $counts[$targetSection->id]++;
                }
            }
        });

        return redirect()->back()->with('success', 'تم التدوير مع مراعاة السعة القصوى لكل قسم.');
    }
}
