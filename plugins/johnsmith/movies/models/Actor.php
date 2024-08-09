<?php namespace JohnSmith\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
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
    public $table = 'johnsmith_movies_actors';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    /* Relations */


    public $belongsToMany = [

        'movies' => [
            'Johnsmith\Movies\Models\Movie',
            'table' => 'johnsmith_movies_actors_movies',
            'order' => 'name',
        ]
    ];


    public $attachOne = [
        'actorimage' => 'System\Models\File'
    ];

}
