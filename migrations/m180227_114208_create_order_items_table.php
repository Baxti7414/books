<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_items`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `books`
 */
class m180227_114208_create_order_items_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'book_id' => $this->integer()->notNull(),
            'status' => $this->integer(),
            'quantity' => $this->integer(),
            'created_time' => $this->datetime(),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            'idx-order_items-order_id',
            'order_items',
            'order_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-order_items-order_id',
            'order_items',
            'order_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `book_id`
        $this->createIndex(
            'idx-order_items-book_id',
            'order_items',
            'book_id'
        );

        // add foreign key for table `books`
        $this->addForeignKey(
            'fk-order_items-book_id',
            'order_items',
            'book_id',
            'books',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-order_items-order_id',
            'order_items'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            'idx-order_items-order_id',
            'order_items'
        );

        // drops foreign key for table `books`
        $this->dropForeignKey(
            'fk-order_items-book_id',
            'order_items'
        );

        // drops index for column `book_id`
        $this->dropIndex(
            'idx-order_items-book_id',
            'order_items'
        );

        $this->dropTable('order_items');
    }
}
