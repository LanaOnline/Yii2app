<?php

use yii\db\Migration;

/**
 * Class m190303_190839_PassHashUpdate
 */
class m190303_190839_PassHashUpdate extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $pass = $this->getDb()->createCommand('SELECT password_hash FROM users WHERE id = 1')->queryScalar();
        $pass2 = $this->getDb()->createCommand('SELECT password_hash FROM users WHERE id = 2')->queryScalar();

        $this->update('users', [
            'password_hash' => \Yii::$app->security->generatePasswordHash($pass)
        ], 'id = 1');
        $this->update('users', [
            'password_hash' => \Yii::$app->security->generatePasswordHash($pass2)
        ], 'id = 2');
        //next time update date_updated too
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190303_190839_PassHashUpdate cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190303_190839_PassHashUpdate cannot be reverted.\n";

        return false;
    }
    */
}
