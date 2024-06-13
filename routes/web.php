<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title'=>'Home']);
});

Route::get('/about', function () {
    return view('about', [
        'title'=>'About',
        'name'=>'robertuswanda'
    ]);
});

Route::get('/posts', function () {
    return view('posts', ['title'=>'Blog', 'posts' => [
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
    ]]);
});

Route::get('/posts/{slug}', function($slug) {
    $posts = [

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

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);

});

Route::get('/contact', function () {
    return view('contact', ['title'=>'Contact']);
});