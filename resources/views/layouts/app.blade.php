<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Task list App</title>
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    
    <h1 class="text-2xl mb-4"> @yield('title')</h1>
    <div>
        @if(session()->has('success'))
        <div>{{ session('success') }}</div>
        @endif
    </div>
    <div>
        @yield('content')  
    </div>
</body>
</html>