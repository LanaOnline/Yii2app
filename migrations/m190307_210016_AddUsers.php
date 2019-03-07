<?php

use yii\db\Migration;

/**
 * Class m190307_210016_AddUsers
 */
class m190307_210016_AddUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'email' => 'email@email.com',
            'password_hash' => \Yii::$app->security->generatePasswordHash('1234'),
            'fio' => 'Email Emailovich Emailov'
        ]);
        $this->insert('users', [
            'email' => 'admin@email.com',
            'password_hash' => \Yii::$app->security->generatePasswordHash('1234'),
            'fio' => 'Admin Adminovich Adminov'
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //delete added rows
        $this->delete('users', ['email' => 'email@email.com']);
        $this->delete('users', ['email' => 'admin@email.com']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190307_210016_AddUsers cannot be reverted.\n";

        return false;
    }
    */
}
