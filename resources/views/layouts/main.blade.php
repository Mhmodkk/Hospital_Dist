<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>نظام التدوير السريري</title>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>body { font-family: 'Cairo', sans-serif; }</style>
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-950">
        <div class="min-h-screen">
            @include('layouts.main-navigation')
            <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
