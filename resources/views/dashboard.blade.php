<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold mb-4">Welcome to Your Dashboard!</h1>

            @auth
                <div class="flex items-center space-x-4 mb-6">
                    @if(Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="Avatar" class="w-16 h-16 rounded-full">
                    @endif
                    <div>
                        <p class="text-lg font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-gray-600">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                        Log Out
                    </button>
                </form>
            @endauth
        </div>
    </div>
</body>
</html>
