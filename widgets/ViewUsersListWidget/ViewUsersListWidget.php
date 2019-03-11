<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/6/2019
 * Time: 6:48 PM
 */

namespace app\widgets\ViewUsersListWidget;

use yii\bootstrap\Widget;

class ViewUsersListWidget extends Widget
{
    public $users;

    public function init()
    {
        parent::init();
        if(empty($this->users)){
            throw new \Exception('Please provide param "users"');
        }
    }
    public function run(){
        return $this->render('index', ['users' =>$this->users]);
    }
}