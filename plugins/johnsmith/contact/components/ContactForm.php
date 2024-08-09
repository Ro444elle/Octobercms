<?php namespace JohnSmith\Contact\Components;


use Cms\Classes\ComponentBase;
use Input;
use Mail;

use Validator;
use Redirect;
use ValidationException;

class ContactForm extends ComponentBase 

{
    public function componentDetails()
    {  
        return [
            'name' => 'ContactForm',
            'description' => 'Simple contact form',
        ];

    }
    
    
    
    public function onSend()
    {
        $data = post();



        $rules =
        [
        'name' => 'required|min:5',
        'email' => 'required|email|unique:users',
        ];
    

        $validator = Validator::make($data, $rules);



        if($validator->fails())
        {
            throw new ValidationException($validator);

        }
            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'message' => Input::get('content')];
            // dd($data);
            
    

    }
    
    
}