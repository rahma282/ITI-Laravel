<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-lg bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Edit Post</h2>
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $post->title) }}"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                    @error('title')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('description', $post->description) }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Posted By</label>
                    <select name="creator" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('creator', $post->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('creator')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Upload New Image</label>
                    <input type="file" name="image" accept=".jpg,.png"
                        class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                    @error('image')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                    @if ($post->image)
                        <div class="mt-4">
                            <p class="text-sm font-medium mb-1">Current Image:</p>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-32 rounded shadow">
                        </div>
                    @endif
                </div>

                <button type="submit" class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Update Post
                </button>
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
