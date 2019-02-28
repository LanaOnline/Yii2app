<?php

use yii\db\Migration;

/**
 * Class m190228_065153_Inserts
 */
class m190228_065153_Inserts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', ['email' => 'email@email.ru', 'password_hash' => '1111',
            'fio' => 'f i o']);
        $this->insert('users', ['email' => 'email2@email.ru', 'password_hash' => '1111',
            'fio' => 'f2 i2 o2']);
        $this->batchInsert('activity', [
            'title', 'startDate', 'endDate', 'user_id'
        ], [
            ['Заголовок 1', date('Y-m-d'), date('Y-m-d'), 1],
            ['Заголовок 1_1', '2019-01-15', date('Y-m-d'), 1],
            ['Заголовок 1_2', date('Y-m-d'), date('Y-m-d'), 1],
            ['Заголовок 1_3', '2019-02-01', date('Y-m-d'), 1],
            ['Заголовок 2_1', date('Y-m-d'), date('Y-m-d'), 2],
            ['Заголовок 2_2', date('Y-m-d'), date('Y-m-d'), 2]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190228_065153_Inserts cannot be reverted.\n";

        return false;
    }
    */
}
