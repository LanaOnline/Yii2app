<?php

namespace app\modules\admin\controllers;


use app\behaviors\LogMyBehavior;
use app\models\Users;
use app\models\UsersCrud;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Returns list of registered users through DataProvider
     * @return string
     */
    public function actionUsers()
    {
        $data = new UsersCrud();
        $dataProvider = $data->search(\Yii::$app->request->queryParams);

        return $this->render('users', ['dataProvider' => $dataProvider]);
    }

    /**
     * Returns user registration form widget
     * @return string
     */
    public function actionCreate()
    {
        $model = new Users();
        $model->password_hash = \Yii::$app->security->generatePasswordHash($model->password);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin/default/users', 'model' => $model]);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $this->render('/default/view', ['model' => $model]);
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}