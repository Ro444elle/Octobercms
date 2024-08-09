<?php


use JohnSmith\Movies\Models\Movie;


Route::get('hello', function () {


    return Movie::orderby('year', 'asc')->paginate(2);

    
});