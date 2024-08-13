<?php namespace JohnSmith\Movies\Components;


use Cms\Classes\ComponentBase;
use Input;



use JohnSmith\Movies\Models\Movie;
use JohnSmith\Movies\Models\Genre;


class FilterMovies extends ComponentBase 

{
    // * set public variable $movies

    public $movies;
    public $genres;
    public $years;

    public function componentDetails()
    {  
        return [
            'name' => 'Filter Movies',
            'description' => 'Filter Movies',
        ];

    }


    public function onRun()
    {

        $this->movies = $this->filterMovies();
        $this->genres = Genre::all();
        $this->years = $this->filterYears();

    }


    protected function filterYears()
    {
        $query = Movie::all();

        $years = [];

        foreach($query as $movie)
        {
            $years[] = $movie->year;
        }



        $years = array_unique($years);
        
        return $years;

        // dd($years);



    }

    protected function filterMovies()
    {
        $year = Input::get('year');
        $genre = Input::get('genre');

        $query = Movie::all();

        


       if($year)
       {
        $query = Movie::where('year', '=', $year)->get();
       }


       if($genre)
       {
         $query = Movie::whereHas('genres', function($filter) use ($genre)
        {
            $filter->where('slug', '=', $genre);
        })->get();

       }
       

       if($year && $genre)
       {
            $query = Movie::whereHas('genres', function($filter) use ($genre)
            {
                $filter->where('slug', '=', $genre);
            })->where('year', '=', $year)->get();
        }


        return $query;
        
    }

}