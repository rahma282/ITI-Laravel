<x-layout>
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700">
            <div class="px-4 py-3 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-base font-medium text-gray-700 dark:text-gray-200">Post Info</h2>
            </div>
            <div class="px-4 py-4">
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                        Title :- <span class="font-normal dark:text-gray-300">{{ $post['title'] }}</span>
                    </h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">Description :-</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ $post['description'] }}.</p>
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
                        Name :- <span class="font-normal dark:text-gray-300">{{ $post['user']['name'] }}</span>
                    </h3>
                </div>
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                        Email :- <span class="font-normal dark:text-gray-300">rahma@gmail.com</span>
                    </h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100">
                        Created At :- <span class="font-normal dark:text-gray-300">Thursday 25th of December 1975 02:15:16 PM</span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-blue-600 dark:bg-blue-500 text-white font-medium rounded hover:bg-gray-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Back to All Posts
            </a>
        </div>
    </div>
</x-layout>
