@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center" dir="rtl">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('إدارة توزيع الطلاب') }}
        </h2>
        <div class="flex gap-2">
            <a href="{{ route('students.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow transition">
                + إضافة طالب
            </a>
            <a href="{{ route('distribute') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow transition">
                🔄 تدوير الشهر القادم
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow-lg font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-6 py-4">اسم الطالب</th>
                            <th class="px-6 py-4">القسم الحالي</th>
                            <th class="px-6 py-4">فترة التدريب</th>
                            <th class="px-6 py-4 text-center">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($students as $student)
                            @php $current = $student->rotations->where('is_active', true)->first(); @endphp
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">{{ $student->name }}</td>
                                <td class="px-6 py-4">
                                    @if($current)
                                        <span class="px-3 py-1 rounded-full text-xs font-black {{ $current->section->name == 'الإسعاف' ? 'bg-red-100 text-red-700 border border-red-200' : 'bg-blue-100 text-blue-700 border border-blue-200' }}">
                                            {{ $current->section->name }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 italic">غير موزع</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs font-mono">{{ $current ? $current->start_date . ' / ' . $current->end_date : '-' }}</td>
                                <td class="px-6 py-4 text-center">
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف الطالب؟')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-500 hover:text-red-700 font-bold transition">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-10 text-center text-gray-500">لا يوجد طلاب مضافين</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
