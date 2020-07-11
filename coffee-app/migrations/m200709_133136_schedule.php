<?php

use yii\db\Migration;

/**
 * Class m200709_133136_schedule
 */
class m200709_133136_schedule extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('schedule', [
            'id' => $this->primaryKey()->unsigned(),
            'email' => $this->string(255)->notNull()->unique(),
            'coffee_time' => $this->time()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200709_133136_schedule cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200709_133136_schedule cannot be reverted.\n";

        return false;
    }
    */
}
