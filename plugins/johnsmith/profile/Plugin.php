<?php namespace JohnSmith\Profile;

use System\Classes\PluginBase;

use Rainlab\User\Controllers\Users as UsersController;

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
        UsersController::extendFormFields(function($form, $model, $context){
        
            $form->addTabFields([
                'facebook' => [
                    'label'=>'Facebook',
                    'type' =>'text',
                    'tab' => 'Profile'
                ],
                'bio' => [
                    'label'=>'Biography',
                    'type' =>'textarea',
                    'tab' => 'Profile'
                ]
            ]);
        });
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
