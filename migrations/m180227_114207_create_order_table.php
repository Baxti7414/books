<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `books`
 */
class m180227_114207_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'quantity' => $this->integer(),
            'sum' => $this->integer(),
            'status' => $this->integer(),
            'name' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'address' => $this->string(),
            'created_time' => $this->datetime(),
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
