<x-layout>
  <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">All Posts</h1>
      <a href="{{ route('posts.create') }}"
        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Create Post</a>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-gray-200 dark:bg-gray-700">
            <th class="px-4 py-2 text-left">#</th>
            <th class="px-4 py-2 text-left">Title</th>
            <th class="px-4 py-2 text-left">Posted By</th>
            <th class="px-4 py-2 text-left">Created At</th>
            <th class="px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr class="border-b dark:border-gray-600 {{ $post->trashed() ? 'bg-red-100 dark:bg-red-900' : '' }}">
              <td class="px-4 py-2">{{ $post->id }}</td>
              <td class="px-4 py-2">{{ $post->slug }}</td>
              <td class="px-4 py-2">{{ $post->user ? $post->user->name : 'Not Found' }}</td>
              <td class="px-4 py-2">{{ $post->formatted_date }}</td>
              <td class="px-4 py-2 space-x-2">
                @if ($post->trashed())
                  <form action="{{ route('posts.restore', $post->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-purple-500 text-white px-3 py-1 rounded hover:bg-purple-600">
                      Restore
                    </button>
                  </form>
                @else
                  <a href="{{ route('posts.show', $post->id) }}"
                    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                  <a href="{{ route('posts.edit', $post->id) }}"
                    class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                  <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                      onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                  </form>
                  <!-- Add the Vue component here to display post info in the modal -->
                  <post-info-modal :post-id="{{ $post->id }}"></post-info-modal>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $posts->links() }}
    </div>
  </div>
</x-layout>
