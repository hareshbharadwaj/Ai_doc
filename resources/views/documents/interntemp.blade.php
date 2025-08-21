<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Templates</title>
    @vite('resources/css/app.css') <!-- make sure Tailwind is linked -->
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow p-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">📄Document  Creator</h1>
            <a href="{{ route('documents.my') }}" 
               class="text-blue-600 font-medium hover:underline">
                My Documents
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Choose a internship Template</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($templates as $template)
    <div class="bg-white rounded-2xl shadow p-6 flex flex-col justify-between">
        <div>
            <img src="{{ $template['image'] }}" alt="{{ $template['name'] }}"
                 class="w-full h-auto object-contain rounded-lg mb-4 bg-gray-100 p-2">

        </div>

        <div class="mt-4">
            <a href="{{ route('documents.template', $template['id']) }}"
               class="inline-block w-full text-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
               Review Template
            </a>
        </div>
    </div>
@endforeach

</div>

    </div>

</body>
</html>
