<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/3/2019
 * Time: 7:05 PM
 */

namespace app\components;


use app\rules\ViewActivityOwnerRule;
use yii\base\Component;

class RbacComponent extends Component
{
    /**
     * @return \yii\rbac\ManagerInterface
     */
    public function getAuthManager() {
        return \Yii::$app->authManager;
    }

    public function generateRbacRules() {
        $authManager = $this->getAuthManager();

        $authManager->removeAll();

        $admin = $authManager->createRole('admin');
        $user = $authManager->createRole('user');

        $authManager->add($admin);
        $authManager->add($user);

        //permission and role names MUST be unique (constants or db records)
        $createActivity = $authManager->createPermission('createActivity');
        $createActivity->description='Создание активности';

        $viewOwnerRule=new ViewActivityOwnerRule();
        $authManager->add($viewOwnerRule);

        $viewActivity = $authManager->createPermission('viewActivity');
        $viewActivity->description='Просмотр активности';
        $viewActivity->ruleName = $viewOwnerRule->name;

        $viewEditAll = $authManager->createPermission('viewEditAll');
        $viewEditAll->description='Просмотр и редактирование всех активностей';

        $authManager->add($createActivity);
        $authManager->add($viewActivity);
        $authManager->add($viewEditAll);

        $authManager->addChild($user,$createActivity);//assign role to user
        $authManager->addChild($user,$viewActivity);

        $authManager->addChild($admin,$user);//assign role to admin, user role + editAll
        $authManager->addChild($admin,$viewEditAll);

        //roles can be assigned at user registration or later
        $authManager->assign($user,3);//assign user role to user with id = 3
        $authManager->assign($admin,4);//assign admin role to user with id = 4
    }
    /**
     * @return bool
     */
    public function canCreateActivity(){
        return \Yii::$app->user->can('createActivity');
    }
    public function canViewEditAll(){
        return \Yii::$app->user->can('viewEditAll');
    }
    public function canViewActivity($activity):bool{
        return \Yii::$app->user->can('viewActivity',['activity'=>$activity]);
    }
}