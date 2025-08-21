<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Internship Certificate</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-xl p-8 max-w-lg w-full">
        <h1 class="text-2xl font-bold mb-6">Edit Internship Certificate</h1>

        <form action="{{ route('documents.preview', 'internship1') }}" method="POST">
            @csrf

            <label class="block mb-2 font-medium">Full Name</label>
            <input type="text" name="name" class="w-full border rounded-lg p-2 mb-4" value="{{ $formData['name'] ?? '' }}">

            <label class="block mb-2 font-medium">Role</label>
            <input type="text" name="role" class="w-full border rounded-lg p-2 mb-4" value="{{ $formData['role'] ?? '' }}">

            <label class="block mb-2 font-medium">Company</label>
            <input type="text" name="company" class="w-full border rounded-lg p-2 mb-4" value="{{ $formData['company'] ?? '' }}">

            <label class="block mb-2 font-medium">Start Date</label>
            <input type="date" name="start_date" class="w-full border rounded-lg p-2 mb-4">

            <label class="block mb-2 font-medium">End Date</label>
            <input type="date" name="end_date" class="w-full border rounded-lg p-2 mb-4">

            <label class="block mb-2 font-medium">Issue Date</label>
            <input type="date" name="issue_date" class="w-full border rounded-lg p-2 mb-6">

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                Preview With My Details
            </button>
        </form>
    </div>
</body>
</html>
