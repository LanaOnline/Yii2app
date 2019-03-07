<?php

use yii\db\Migration;

/**
 * Class m190228_061317_CreateTables
 */
class m190228_061317_CreateTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity',[
           'id' => $this->primaryKey(),
           'title' => $this->string(150)->notNull(),
           'description' => $this->text(),
           'startDate' => $this->date()->notNull(),
           'endDate' => $this->date()->notNull(),
           'is_blocked' => $this->boolean()->notNull()->defaultValue(0),
           'recurring' => $this->boolean()->notNull()->defaultValue(0),
            'date_created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'date_updated' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email'=> $this->string(150)->notNull(),
            'password_hash' => $this->string(300)->notNull(),
            'token' => $this->string(150),
            'fio' => $this->string(150),
            'date_created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'date_updated' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('activity');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190228_061317_CreateTables cannot be reverted.\n";

        return false;
    }
    */
}
