<?php namespace JohnSmith\Movies\Components;


use Cms\Classes\ComponentBase;
use Input;


use Validator;
use Redirect;
use JohnSmith\Movies\Models\Actor;
use Flash;

class ActorForm extends ComponentBase 

{
    public function componentDetails()
    {  
        return [
            'name' => 'ActorForm',
            'description' => 'Enter Actors',
        ];

    }
    

    
    
    public function onSave()
    {

        $actor = new Actor();
        $actor->name = Input::get('name');
        $actor->last_name = Input::get('lastname');
        $actor->age = Input::get('age');
        $actor->actorimage = Input::file('actorimage');

        $actor->save();

        Flash::success('Actor added successfully!');

        return Redirect::back();
    
    }
    
    
}