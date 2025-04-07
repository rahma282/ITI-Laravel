<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-lg bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Edit Post</h2>
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}"
                           class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Description</label>
                    <textarea name="description" rows="3"
                              class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">{{ $post->description }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Posted By</label>
                    <select name="creator"
                            class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $post->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                    </select>
                </div>

                <button type="submit"
                        class="w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Update Post
                </button>
                <div class="flex justify-end">
                    <a href="{{ route('posts.index') }}" class="w-full text-center px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-medium rounded hover:bg-gray-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Back to All Posts
                    </a>
                 </div>
            </form>
        </div>
    </div>
</x-layout>
