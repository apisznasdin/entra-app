<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">

            @auth
                <h2 class="text-xl font-semibold text-center mb-4">You are logged in!</h2>
                <a href="{{ route('dashboard') }}" class="block w-full text-center bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition mb-2">
                    Go to Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition">
                        Log Out
                    </button>
                </form>
            @else
                <h1 class="text-2xl font-bold text-center mb-6">Log In to Your App</h1>
                <a href="{{ route('microsoft.redirect') }}" class="flex items-center justify-center w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    <!-- Simple Microsoft Logo SVG -->
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 23 23">
                        <path d="M0 0H11V11H0V0ZM12 0H23V11H12V0ZM0 12H11V23H0V12ZM12 12H23V23H12V12Z"/>
                    </svg>
                    Log in with Microsoft
                </a>
            @endauth

        </div>
    </div>
</body>
</html>
