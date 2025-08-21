<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        
            <h1 class="text-2xl font-bold mb-6">Welcome to My Site</h1>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium">Email:</label>

                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                           class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium">Password:</label>
                    <input type="password" id="password" name="password" required value="{{ old('password') }}"
                           class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
                </div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                    Login
                </button>

                
                @if ($errors->any())
                <div class="mt-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </form>
            <div class="mt-6">
                <form action="{{ route('google.login') }}" method="GET">
                    <button type="submit"
                            class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                        Login with Google
                    </button>
                </form>
            </div>
            <div class="mt-4 text-center">
            <p class="text-sm">
                Dont have an account?
                <a href="{{ route('show.register') }}" class="text-blue-600 hover:underline">
                    Register here
                </a>
            </p>
        </div>

    </div>
</body>
</html>

