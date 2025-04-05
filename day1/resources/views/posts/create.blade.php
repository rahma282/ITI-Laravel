<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Create Post</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white flex justify-center items-center min-h-screen">
    <div class="w-full max-w-lg bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Create Post</h2>
        <form action="/posts" method="POST">
            @csrf
            <!-- Title -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Title</label>
                <input type="text" name="title" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea name="description" rows="3" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <!-- Post Creator -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Post Creator</label>
                <select name="creator" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                    <option>Rahma</option>
                    <option>Nouran</option>
                    <option>Fares</option>
                    <option>Gohar</option>
                    <option>Ahmed</option>
                    <option>Mostafa</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Create</button>
        </form>
    </div>
</body>
</html>
