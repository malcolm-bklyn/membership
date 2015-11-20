<?php namespace XNok\Membership\Controllers;

use BackendMenu;
use Redirect;
use Backend\Classes\Controller;

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

    public function update($id){
        return Redirect::to('/backend/xnok/membership/members/update/' .$id);
    }
}