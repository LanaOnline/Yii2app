<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 3/10/2019
 * Time: 4:11 PM
 */

namespace app\modules\admin\controllers;


use app\models\Users;
use app\models\UsersCrud;
use Yii;
use yii\db\Expression;
use yii\web\NotFoundHttpException;

class UsersController extends DefaultController
{
    /**
     * Returns list of registered users through DataProvider
     * @return string
     */
    public function actionData()
    {
        $data = new UsersCrud();
        $dataProvider = $data->search(\Yii::$app->request->queryParams);

        return $this->render('data', ['dataProvider' => $dataProvider]);
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
            return $this->redirect(['/admin/users/data', 'model' => $model]);
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
        return $this->render('/users/view', ['model' => $this->findModel($id)]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the Users page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //update date before save
            $model->date_updated = new Expression('NOW()');

            if ($model->save()) {
                return $this->redirect(['/admin/users/data']);
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the Users page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/admin/users/data']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}