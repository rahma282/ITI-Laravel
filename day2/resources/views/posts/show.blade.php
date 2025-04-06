<x-layout>
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700">
            <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-base font-medium text-gray-700 dark:text-gray-200">Post Info</h2>
            </div>
            <div class="px-4 py-4">
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                        Title :- <span class="font-normal dark:text-gray-300">{{ $post->title }}</span>
                    </h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">Description :-</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ $post->description }}.</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700">
            <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-base font-medium text-gray-700 dark:text-gray-200">Post Creator Info</h2>
            </div>
            <div class="px-4 py-4">
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                        Name :- <span
                            class="font-normal dark:text-gray-300">{{$post->user ? $post->user->name : 'Not Found'}}</span>
                    </h3>
                </div>
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                        Email :- <span
                            class="font-normal dark:text-gray-300">{{$post->user ? $post->user->email : 'Not Found'}}</span>
                    </h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                        Created At :- <span
                            class="font-normal dark:text-gray-300">{{ \Carbon\Carbon::parse($post->created_at)->format('l d, F Y - h:i A') }}</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded border p-4 mt-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Comments</h3>

            <form action="{{ route('comments.store') }}" method="POST" class="mb-6">
                @csrf

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Comment Creator</label>
                    <select name="creator" class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <textarea name="comment" rows="3" class="w-full p-2 border rounded"
                    placeholder="Add your comment..."></textarea>

                <button type="submit"
                    class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Submit</button>
            </form>

            @foreach ($post->comments as $comment)
                <div class="border-t pt-2 mt-2">
                    <p class="text-gray-700 dark:text-gray-300">{{ $comment->comment }}</p>
                    <small class="text-gray-500">by {{ $comment->user->name }} |
                        {{ $comment->created_at->diffForHumans() }}</small>

                    <a href="{{ route('comments.edit', $comment->id) }}"
                    class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                            Delete
                        </button>
                    </form>
            @endforeach
            </div>

            <div class="flex justify-end">
                <a href="{{ route('posts.index') }}"
                    class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-medium rounded hover:bg-gray-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Back to All Posts
                </a>
            </div>
        </div>
</x-layout>
