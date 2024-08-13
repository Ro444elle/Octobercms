<?php


use JohnSmith\Movies\Models\Movie;
use JohnSmith\Movies\Models\Actor;
use JohnSmith\Movies\Models\Genre;



Route::get('hello', function ()
{


    return Movie::orderby('year', 'asc')->paginate(2);

    
});


Route::get('sitemap.xml', function()
{
    $movies = Movie::all();
    $genres = Genre::all();

    return Response::view('johnsmith.movies::sitemap', ['movies' => $movies, 'genres' => $genres])->header('Content-Type', 'text/xml');

});