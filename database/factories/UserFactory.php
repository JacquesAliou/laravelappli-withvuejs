<?php

/** @var Factory $factory */

use App\Category;
use App\Comment;
use App\Post;
use App\Profile;
use App\Tutorial;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $rand = rand(0, 11);
    $avatar = [
        '/images/avatar/ade.jpg',
        '/images/avatar/daniel.jpg',
        '/images/avatar/elliot.jpg',
        '/images/avatar/jenny.jpg',
        '/images/avatar/joe.jpg',
        '/images/avatar/justen.jpg',
        '/images/avatar/laura.jpg',
        '/images/avatar/steve.jpg',
        '/images/avatar/stevie.jpg',
        '/images/avatar/tom.jpg',
        '/images/avatar/veronika.jpg',
        '/images/avatar/zoe.jpg',
    ];
    return [
        'title' => $faker->title,
        'name' => $faker->unique()->firstname,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'secret',
        'avatar' => $avatar[$rand], // images au hasard pour l'avatar
        'remember_token' => Str::random(60),
    ];
});



$factory->define(Profile::class, function (Faker $faker) {

    return [
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'age' => rand(15,100),
    ];
});



$factory->define(Category::class, function (Faker $faker) {

    $rand = rand(0, 5);
    $color = [
      'blue', 'red', 'orange', 'violet', 'purple', 'olive'
    ];

    return [
        'name' => $faker->word, // ce sera just un mot
        'description' => $faker->sentence,
        'color' => $color[$rand], // couleur au hasard
    ];
});


$factory->define(Post::class, function (Faker $faker) {

    return [
        'name' => $faker->text(15),
        'body' => $faker->text(800),
    ];
});


$factory->define(Tutorial::class, function (Faker $faker) {

    return [
        'name' => $faker->text(15),
        'body' => $faker->text(200),
    ];
});

$factory->define(Comment::class, function (Faker $faker) {

    return [

        'body' => $faker->sentence,
    ];
});
