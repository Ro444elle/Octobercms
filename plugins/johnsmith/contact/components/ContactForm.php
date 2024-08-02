<?php namespace JohnSmith\Contact\Components;


use Cms\Classes\ComponentBase;
use Input;
use Mail;

use Validator;
use Redirect;

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
        $validator = Validator::make( 
            [
                'name' => Input::get('name'),
                'email' => Input::get('email'),
            ],
        
            [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users',
            ],
    
        );



        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
            //Do somenthing

        } else {

            $data = ['name' => Input::get('name'), 'email' => Input::get('email'), 'message' => Input::get('content')];
            
            Mail::send('johnsmith.contact::mail.message', $data, function($message) 
            {
                $message->to('test@domain.com', 'Admin Person');
                $message->subject('New message from contact form');
        
            });
        }


    
    }
    
    
}