<?php namespace XNok\Membership\Controllers;

use BackendMenu;
use Redirect;
use Backend\Classes\Controller;
use Backend\Models\User as UserModel;
use XNok\Membership\Models\Profile as ProfileModel;

/**
 * Membership Checker Back-end Controller
 */
class MembershipChecker extends Controller
{
    public $implement = [
        'Backend.Behaviors.ListController'
    ];

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('XNok.Membership', 'member', 'membershipchecker');
    }

    public function update($id)
    {
        return Redirect::to('/backend/xnok/membership/members/update/' .$id);
    }

    public function onSwitch()
    {
        $id = post('user_id');
        $name = post('col');
        $value = !post($name);

        $profile = ProfileModel::where('user_id', $id)->get();

        //ensure that user always has a profile
        if(!$profile){
            ProfileModel::getFromUser(UserModel::find($id));
            $profile = ProfileModel::where('user_id', $id)->get();
        }

        ProfileModel::where('user_id', $id)->update([$name => $value]);
        
        return [
            'value' => $value,
        ];

    }
}