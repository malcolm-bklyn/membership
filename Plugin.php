<?php namespace XNok\Membership;

use Yaml;
use File;
use Backend;
use System\Classes\PluginBase;
use Backend\Models\User as UserModel;
use Backend\Controllers\Users as UsersController;
use XNok\Membership\Models\Profile as ProfileModel;
use XNok\Membership\Controllers\Members as MembersController;

/**
 * membership Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'membership',
            'description' => 'No description provided yet...',
            'author'      => 'xNok',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerPermissions(){
        return [

        ];
    }

    public function registerNavigation()
    {
        return [
            'member' => [
                'label'       => 'Member',
                'url'         => Backend::url('xnok/membership/members'),
                'icon'        => 'icon-user',
                'permissions' => ['xnok.membership.*'],
                'order'       => 100,
            
                'sideMenu' => [
                    'members' => [
                        'label' => 'All Members',
                        'icon'  => 'icon-user',
                        'url'   => Backend::url('xnok/membership/members'),
                        'permissions' => ['xnok.membership.*'],
                    ],
                    'membershipchecker' => [
                        'label' => 'Menbership Checker',
                        'icon'  => 'icon-check-circle-o',
                        'url'   => Backend::url('xnok/membership/membershipChecker'),
                        'permissions' => ['xnok.membership.*'],
                    ]
                ]
            ]
        ];
    }    

    /**
     * Run when the Plugin is loaded
     * Difine the extention of user plugin
     * @return [type] [description]
     */
    public function boot()
    {
        UserModel::extend(function($model){
            $model->hasOne['profile'] = ['XNok\Membership\Models\Profile'];
        });

        UsersController::extendFormFields(function($form, $model, $context){
            $this->extendUserFormFields($form, $model, $context);
        });

        MembersController::extendFormFields(function($form, $model, $context){
            $this->extendUserFormFields($form, $model, $context);
        });

        MembersController::extendListColumns(function($list, $model){
            if(!$model instanceof UserModel)
                return;

            $list->addColumns([
                'is_activated' => [
                    'label' => 'activated',
                    'type'  => 'switch',
                ]
            ]);
        });
    }

    private function extendUserFormFields($form, $model, $context){
            if(!$model instanceof UserModel)
                return;

            if(!$model->exists)
                return;

            //ensure that user always has a profile
            ProfileModel::getFromUser($model);

            $configFile = __DIR__ . '/models/profile/fields.yaml';
            $config = Yaml::parse(File::get($configFile));
            $form->addTabFields($config);
    }

}
