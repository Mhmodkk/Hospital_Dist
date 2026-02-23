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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">الاسم الكامل</label>
                        <input type="text" id="name" name="name" class="w-full p-4 rounded-xl border dark:bg-gray-800 dark:text-white" required>
                    </div>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white p-4 rounded-xl font-bold">حفظ الطالب</button>
            </form>
        </div>
    </div>
@endsection
