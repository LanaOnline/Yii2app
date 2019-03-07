<?php
/**
 * Created by PhpStorm.
 * User: Lana
 * Date: 2/28/2019
 * Time: 1:20 PM
 */

namespace app\components;

use yii\base\Component;
use yii\db\Query;
use yii\log\Logger;

class DaoComponent extends Component
{
    /**
     * @return \yii\db\Connection
     */
    public function getDb() {
        return \Yii::$app->db;
    }

    public function getAllUsers() {
        $sql = 'SELECT * FROM users';
        return $this->getDb()->createCommand($sql)->queryAll();
    }

    public function getUserActivities($id=2) {
        $sql = 'SELECT * FROM activity WHERE user_id=:user';
        return $this->getDb()->createCommand($sql, [':user' => $id])->queryAll();
    }

    public function getFirstActivity() {
        $sql = 'SELECT *FROM activity LIMIT 3';
        return $this->getDb()->createCommand($sql)->queryOne();
    }

    public function countRecurringActivities() {
        $sql = 'SELECT count(id) FROM activity WHERE recurring = 1';
        return $this->getDb()->createCommand($sql)->queryScalar();//returns first col, first row value
    }

    public function getAllUserActivities($id_user) {
        $query = new Query();

        return $query->select(['title', 'startDate', 'email'])
                ->from('activity a')
                ->innerJoin('users u', 'a.user_id=u.id')
                ->andWhere(['a.user_id' => $id_user])
            //conditioned query example
//              ->andWhere(new InCondition('user_id','in',[]))
                ->andWhere('a.date_created<=:date',[':date' => date('Y-m-d')])
                ->orderBy(['a.id' => SORT_DESC])
                ->limit(10)
                ->createCommand()->rawSql;
    }

    /**
     * @return \yii\db\DataReader
     * returns data one by one to save memory space
     */
    public function getActivityReader() {
        $sql = 'SELECT * FROM users';
        return $this->getDb()->createCommand($sql)->query();

    }

    /**
     * test data insert
     */
    public function insertTest() {
        $trans = $this->getDb()->beginTransaction();

        try {
            $this->getDb()->createCommand()->insert('activity', [
                'user_id' => 2,
                'title' => 'title1',
                'startDate' => date('Y-m-d'),
                'endDate' => date('Y-m-d')
            ])->execute();

            //rollback amids transaction
//            throw new \Exception('test');

            $this->getDb()->createCommand()->insert('activity', [
                'user_id' => 2,
                'title' => 'title2',
                'startDate' => date('Y-m-d'),
                'endDate' => date('Y-m-d')
            ])->execute();

            $trans->commit();

        } catch (\Exception $e) {//always rollback transaction in case of an error to prevent further quiet error rollbacks
            \Yii::getLogger()->log($e->getMessage(),Logger::LEVEL_ERROR);
            $trans->rollBack();
        }
    }
}