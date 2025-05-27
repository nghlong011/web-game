<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Web Game') }}</title>
    <link rel="icon" type="image/png" href="/favicon.png">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/build/batte.css">
    <link rel="stylesheet" href="/build/home.css">
</head>
<body class="bg-black min-h-screen">
    @yield('content')
</body>
</html> 