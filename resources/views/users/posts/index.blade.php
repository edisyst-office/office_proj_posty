
@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="font-medium text-2xl mb-1">{{ $user->name }}</h1>
                <p>
                    He posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}
                    and received {{ $user->receivedLikes->count() }} likes
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                @if($posts->count())
                    @foreach($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>{{ $user->name }} non ha ancora pubblicato post</p>
                @endif
            </div>
        </div>
    </div>
@endsection
