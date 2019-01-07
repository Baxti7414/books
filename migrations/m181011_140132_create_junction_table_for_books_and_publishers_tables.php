<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books_publishers`.
 * Has foreign keys to the tables:
 *
 * - `books`
 * - `publishers`
 */
class m181011_140132_create_junction_table_for_books_and_publishers_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books_publishers', [
            'books_id' => $this->integer(),
            'publishers_id' => $this->integer(),
            'PRIMARY KEY(books_id, publishers_id)',
        ]);

        // creates index for column `books_id`
        $this->createIndex(
            'idx-books_publishers-books_id',
            'books_publishers',
            'books_id'
        );

        // add foreign key for table `books`
        $this->addForeignKey(
            'fk-books_publishers-books_id',
            'books_publishers',
            'books_id',
            'books',
            'id',
            'CASCADE'
        );

        // creates index for column `publishers_id`
        $this->createIndex(
            'idx-books_publishers-publishers_id',
            'books_publishers',
            'publishers_id'
        );

        // add foreign key for table `publishers`
        $this->addForeignKey(
            'fk-books_publishers-publishers_id',
            'books_publishers',
            'publishers_id',
            'publishers',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `books`
        $this->dropForeignKey(
            'fk-books_publishers-books_id',
            'books_publishers'
        );

        // drops index for column `books_id`
        $this->dropIndex(
            'idx-books_publishers-books_id',
            'books_publishers'
        );

        // drops foreign key for table `publishers`
        $this->dropForeignKey(
            'fk-books_publishers-publishers_id',
            'books_publishers'
        );

        // drops index for column `publishers_id`
        $this->dropIndex(
            'idx-books_publishers-publishers_id',
            'books_publishers'
        );

        $this->dropTable('books_publishers');
    }
}
