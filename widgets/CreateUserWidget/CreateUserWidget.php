<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/8/2019
 * Time: 10:26 PM
 */

namespace app\widgets\CreateUserWidget;


use yii\bootstrap\Widget;

class CreateUserWidget extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
        if(empty($this->model)){
            throw new \Exception('Please provide parameter "users"');
        }
    }
    public function run(){
        return $this->render('index', ['model' =>$this->model]);
    }
}