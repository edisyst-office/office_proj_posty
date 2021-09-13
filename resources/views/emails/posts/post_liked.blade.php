@component('mail::message')
# Hai ricevuto un like

Al tizio {{ $liker->name }} è piaciuto il tuo post.

@component('mail::button', ['url' => route('posts.show', $post)])
    Vai a leggere il post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
