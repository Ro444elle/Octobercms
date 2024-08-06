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
            throw new \ValidationException($validator);

            return ['#result' => $this->renderPartial('contactform::messages', [
                'errorMsgs' => $validator->messages()->all(),
                'fieldMsgs' => $validator->messages(),
            ])];
            //Do somenthing

        } 

        $data = ['name' => Input::get('name'), 'email' => Input::get('email'), 'message' => Input::get('content')];
        // dd($data);
        
        // Mail::send('johnsmith.contact::mail.message', $data, function($message) 
        // {
        //     $message->to('test@domain.com', 'Admin Person');
        //     $message->subject('New message from contact form');
    
        // });

    
    }
    
    
}