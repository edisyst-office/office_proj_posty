## Project Posty funzionante

Login, bacheca, seeder, 3 utenti, JWT

    laravel new posty
    npm install tailwindcss
    npm install && npm run dev


#### INSTALLA DEBUG-BAR
    composer require barryvdh/laravel-debugbar --dev
    
SE POI LA VOGLIO POTER MODIFICARE DA CONFIG
    
    php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"



#### INSTALLA AUTENTICAZIONE CON JWT
    composer require tymon/jwt-auth
    php artisan jwt:secret
    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

####Altro
    php artisan tinker
    App\Models\Post::factory()->times(200)->create(['user_id' => 2])
    
    php artisan make:migration create_likes_table --create=likes
    
    php artisan make:mail PostLiked --markdown=emails.posts.post_liked
