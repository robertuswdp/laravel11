<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post {
    public static function all()
    {
        return [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title'=>'Judul artikel 1',
            'author'=>'Robertus Wanda',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis explicabo dolorum
            qui praesentium! Aliquid sint vitae accusamus! Explicabo minus consequuntur, optio saepe dolorem voluptates
            numquam aliquam repellendus! Ducimus, repudiandae esse.<'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title'=>'Judul artikel 2',
            'author'=>'Robertus Wanda',
            'body' => 'efwefwefwefwfwefwonfwnfoiweonfwenfonwoeifnwoenfowneofnwoenfownefoiwnefw wewj efk wekfj wekjf wke fkw efkjw ekf wke fkwe fkjwekf wke fkw efkjw kfj wke fkw fkjw ekfj wkej fkwj efkjw efkj wekf wkj fkwj efkj wkjf wkje fkjw ef'
        ],
    ];
    }

    public static function find($slug): array
    {

    // ini menggunakan callback pada laravel 8
    //    return Arr::first(Post::all(), function($post) use ($slug) {
    //     return $post['slug'] == $slug;
    // });

    // dibawah ini menggunakan aero function pada laravel sama saja sedengan code yang di atas
       $post =  Arr::first(Post::all(), fn($post) => $post['slug'] == $slug);

       if(! $post) {
        abort(404);
       }

       return $post;
    }
}