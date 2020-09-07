<?php

use App\Category;
use App\Comment;
use App\Post;
use App\Profile;
use App\Tutorial;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class,20)->create();
        $category = factory(Category::class, 5)->create();


        $user->each(function($user) use($category){
            factory(Profile::class,1)->create([
                'user_id' => $user->id,
            ]);
        });



        $user->each(function($userId) use($category, $user){
           $post = factory(Post::class)->create([
                'user_id' => $userId->id,
                'category_id' => function() use($category){

                    return $category->random()->id;
                }
            ]);

           $post->each(function($post) use($user){
               factory(Comment::class, 10)->create([
                   'user_id' => function() use($user){
                    return $user->random()->id;
                   },
                   'commentable_id' => $post->id,
                   'commentable_type' => get_class($post),

               ]);

           });
        });


        $user->each(function($user) use($category){
            factory(Tutorial::class)->create([
                'user_id' => $user->id,
                'category_id' => function() use($category){

                    return $category->random()->id;
                }
            ]);
        });
    }
}
