<?php namespace JohnSmith\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array dates to cast from the database.
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'johnsmith_movies_';

    // protected $jsonable = ['actors'];






    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];



    /* Relations */


    public $belongsToMany = [
        
        'genres' => [
            'Johnsmith\Movies\Models\Genre',
            'table' => 'johnsmith_movies_movies_genres',
            'order' => 'genre_title',
        ],

        'actors' => [
            'Johnsmith\Movies\Models\Actor',
            'table' => 'johnsmith_movies_actors_movies',
            'order' => 'name',
        ],
    ];



   

    public $attachOne = [
        'poster' =>'System\Models\File'
    ];



    public $attachMany = [
        'movie_gallery' =>'System\Models\File'
    ];


}
