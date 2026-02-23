@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-right">
        {{ __('تسجيل طالب جديد') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 bg-gray-50 dark:bg-gray-950 min-h-screen" dir="rtl">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('students.store') }}"
                class="p-8 bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 text-right">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">الاسم الكامل</label>
                        <input type="text" id="name" name="name" class="w-full p-4 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-indigo-500" required>
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="start_date" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">تاريخ بداية الدورة</label>
                        <input type="date" id="start_date" name="start_date"
                               value="{{ now()->startOfMonth()->format('Y-m-d') }}"
                               class="w-full p-4 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-indigo-500" required>
                    </div>

                    <div>
                        <label for="end_date" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">تاريخ نهاية الدورة</label>
                        <input type="date" id="end_date" name="end_date"
                               value="{{ now()->endOfMonth()->format('Y-m-d') }}"
                               class="w-full p-4 rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:ring-indigo-500" required>
                    </div>
                </div>

                <div class="p-4 bg-indigo-50 dark:bg-indigo-900/30 rounded-xl border border-indigo-100 dark:border-indigo-800 mb-8 text-right text-sm text-indigo-700 dark:text-indigo-300">
                    💡 سيتم فحص السعة المتاحة في الأقسام بناءً على التواريخ المختارة أعلاه وتوزيع الطالب تلقائياً.
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white p-4 rounded-xl font-bold transition shadow-lg shadow-indigo-500/20">
                    حفظ الطالب وتوزيعه
                </button>
            </form>
        </div>
    </div>
@endsection
