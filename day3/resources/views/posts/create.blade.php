<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-lg bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Create Post</h2>

            <form action="/posts" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                    @error('title')
                        <p class="text-sm text-red-500 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-500 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Post Creator</label>
                    <select name="creator" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('creator') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('creator')
                        <p class="text-sm text-red-500 dark:text-red-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Create</button>

                <div class="flex justify-end mt-2">
                    <a href="{{ route('posts.index') }}"
                        class="w-full text-center px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-medium rounded hover:bg-gray-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Back to All Posts
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
