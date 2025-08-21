
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">My Site</h1>

        @guest
            
            <div class="flex space-x-4">
                <a href="{{ route('show.login') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Login
                </a>
                
            </div>
        @endguest
        
        @auth
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">Welcome, {{ $user->name }}!</span>
                <a href="{{ route('logout') }}"
                   class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Logout
                </a>
            </div>
        @endauth
        
    </nav>

    <!-- Main Content -->
    <div class="flex-grow flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md text-center">
            <h2 class="text-2xl font-bold">welcome</h2>
            @auth
            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"><a href="{{ route('documents.index') }}"> view documents</a></button>
            
        @endauth
        </div>
    </div>

</body>

</html>

