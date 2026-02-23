<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700" dir="rtl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="font-bold text-xl text-indigo-600 dark:text-indigo-400">
                    👨‍⚕️ نظام الطلاب
                </a>
            </div>

            <div class="flex items-center space-x-4 space-x-reverse">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-300 underline">لوحة التحكم</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-300 underline">تسجيل الدخول</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="mr-4 text-sm text-gray-700 dark:text-gray-300 underline">إنشاء حساب</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>
