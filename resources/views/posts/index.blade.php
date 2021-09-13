@extends('layouts.app')

@section('content')
    <div class="flex container mx-auto px-4">

        <div class="w-4/12 h-full bg-white m-6 p-6 rounded-lg">
            @guest
                <p>Per poter inserire post devi <a href="{{ route('login') }}"><b>fare login cliccando qui</b></a></p>
            @endguest

            @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf

                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" placeholder="Post something..." cols="30" rows="6"
                                  class="bg-gray-100 border-2 w-full p-4 rounded-lg
                            @error('body') border-red-500 @enderror"></textarea>

                        @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div>
                        <button class="bg-blue-500 text-white px-4 py-3 rounded dont-medium w-full">Post</button>
                    </div>
                </form>
            @endauth
        </div>



        <div class="w-8/12 bg-white m-6 p-6 rounded-lg">
            @if($posts->count())
                @foreach($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
                {{ $posts->links() }}

            @else
                <p>Questo utente non ha ancora pubblicato post</p>
            @endif
        </div>
    </div>


@endsection
