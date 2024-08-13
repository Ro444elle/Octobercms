<?php namespace JohnSmith\Movies;

use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }




    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        \Event::listen('offline.sitesearch.query', function ($query) {

            // The controller is used to generate page URLs.
        

            // Search your plugin's contents
            $items = Models\Movie::where('name', 'like', "%${query}%")
                ->orWhere('description', 'like', "%${query}%")
                ->get();

            // Now build a results array
            $results = $items->map(function ($item) use ($query) {

                // If the query is found in the title, set a relevance of 2
                $relevance = mb_stripos($item->title, $query) !== false ? 2 : 1;

                // Optional: Add an age penalty to older results. This makes sure that
                // newer results are listed first.
                // if ($relevance > 1 && $item->created_at) {
                //    $ageInDays = $item->created_at->diffInDays(\Illuminate\Support\Carbon::now());
                //    $relevance -= \OFFLINE\SiteSearch\Classes\Providers\ResultsProvider::agePenaltyForDays($ageInDays);
                // }


                if ($item->poster)
                {
                    return [
                        'title'     => $item->name,
                        'text'      => $item->description,
                        'url'       => 'movies/' . $item->slug,
                        'thumb'     => $item->poster->first(), // Instance of System\Models\File
                        'relevance' => $relevance, // higher relevance results in a higher
                                                // position in the results listing
                        // 'meta' => 'data',       // optional, any other information you want
                                                // to associate with this result
                        // 'model' => $item,       // optional, pass along the original model
                    ];

                } 
                else 
                {
                    return [
                        'title'     => $item->name,
                        'text'      => $item->description,
                        'url'       => '/movies/' . $item->slug,
                        'relevance' => $relevance, // higher relevance results in a higher
                    ];
                }
            });

            return [
                'provider' => 'Movie', // The badge to display for this result
                'results'  => $results,
            ];
        });
    }
    



    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            'JohnSmith\Movies\Components\Actors' => 'actors',
            'JohnSmith\Movies\Components\ActorForm' => 'actorform',
            'JohnSmith\Movies\Components\FilterMovies' => 'filtermovies',
        
        ];
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
