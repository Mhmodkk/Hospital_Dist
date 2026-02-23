<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700" dir="rtl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center text-2xl">
                    <a href="{{ route('students.index') }}">👨‍⚕️</a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:mr-10 sm:flex space-x-reverse gap-6">
                    <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')">
                        {{ __('قائمة الطلاب') }}
                    </x-nav-link>
                    <x-nav-link :href="route('students.create')" :active="request()->routeIs('students.create')">
                        {{ __('إضافة طالب') }}
                    </x-nav-link>
                    <x-nav-link :href="route('distribute')" :active="request()->routeIs('distribute')">
                        {{ __('تدوير الطلاب') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:mr-6">
                <span class="text-gray-500 dark:text-gray-400 text-sm font-bold">
                    نظام إدارة الأقسام
                </span>
            </div>
        </div>
    </div>
</nav>
