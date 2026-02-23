@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-right">
        {{ __('لوحة تحكم توزيع الطلاب') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md border-r-4 border-indigo-500">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-bold">إجمالي الطلاب</h3>
                    <p class="text-3xl font-black dark:text-white mt-2">{{ \App\Models\Student::count() }}</p>
                </div>

                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md border-r-4 border-red-500">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-bold">في قسم الإسعاف حالياً</h3>
                    <p class="text-3xl font-black dark:text-white mt-2">
                        {{ \App\Models\Rotation::where('is_active', true)->whereHas('section', fn($q) => $q->where('name', 'الإسعاف'))->count() }}
                    </p>
                </div>

                <div class="p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md border-r-4 border-green-500">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-bold">في الاختصاصات الأخرى</h3>
                    <p class="text-3xl font-black dark:text-white mt-2">
                        {{ \App\Models\Rotation::where('is_active', true)->whereHas('section', fn($q) => $q->where('name', '!=', 'الإسعاف'))->count() }}
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg text-center border border-indigo-100 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">جاهز لإدارة التوزيع؟</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">يمكنك إضافة طلاب جدد أو إجراء التدوير الشهري بضغطة زر واحدة.</p>
                <a href="{{ route('students.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-black py-3 px-8 rounded-full shadow-lg shadow-indigo-500/40 transition-all transform hover:scale-105">
                    الدخول إلى لوحة إدارة الطلاب ←
                </a>
            </div>
        </div>
    </div>
@endsection
