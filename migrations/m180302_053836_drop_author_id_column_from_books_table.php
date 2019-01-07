<?php

use yii\db\Migration;

/**
 * Handles dropping author_id from table `books`.
 */
class m180302_053836_drop_author_id_column_from_books_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        // drops foreign key for table `authors`
        $this->dropForeignKey(
            'fk-books-author_id',
            'books'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-books-author_id',
            'books'
        );

        $this->dropColumn('books', 'author_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->addColumn('books', 'author_id', $this->integer());

        // creates index for column `author_id`
        $this->createIndex(
            'idx-books-author_id',
            'books',
            'author_id'
        );

        // add foreign key for table `authors`
        $this->addForeignKey(
            'fk-books-author_id',
            'books',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
    }
}
