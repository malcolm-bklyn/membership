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
            'membership' => [
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
                    ],
                    'jobs' => [
                        'label' => 'Jobs',
                        'icon'  => 'icon-coffee',
                        'url'   => Backend::url('xnok/membership/jobs'),
                        'permissions' => ['xnok.membership.*'],
                    ],
                    'mandates' => [
                        'label' => 'Mamdates',
                        'icon'  => 'icon-users',
                        'url'   => Backend::url('xnok/membership/mandates'),
                        'permissions' => ['xnok.membership.*'],
                    ],
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
            $model->belongsToMany['jobs'] = ['XNok\Membership\Models\Job', 'table' => 'xnok_membership_job_users'];
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
}
