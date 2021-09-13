@props(['post' => $post])

<div class="bg-gray-200 rounded p-2 mb-2">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    <a href="{{ route('posts.show', $post) }}" class="font-bold">(Leggi il post)</a>

    <p class="mb-2">{{ $post->body }}</p>

    @can('delete', $post)
        <div class="mb-4">
            <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">DELETE</button>
            </form>
        </div>
    @endcan

    <div class="flex item-center">
        @auth
            @if(!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-1 rounded">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-black text-white px-1 rounded">Unlike</button>

                </form>
            @endif
        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>
