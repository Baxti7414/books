<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books_authors`.
 * Has foreign keys to the tables:
 *
 * - `books`
 * - `genre`
 */
class m180126_133557_create_junction_table_for_books_and_authors_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('books_authors', [
            'books_id' => $this->integer(),
            'author_id' => $this->integer(),
            'PRIMARY KEY(books_id, author_id)',
        ]);

        // creates index for column `books_id`
        $this->createIndex(
            'idx-books_authors-books_id',
            'books_authors',
            'books_id'
        );

        // add foreign key for table `books`
        $this->addForeignKey(
            'fk-books_authors-books_id',
            'books_authors',
            'books_id',
            'books',
            'id',
            'CASCADE'
        );

        // creates index for column `author_id`
        $this->createIndex(
            'idx-books_authors-author_id',
            'books_authors',
            'author_id'
        );

        // add foreign key for table `authors`
        $this->addForeignKey(
            'fk-books_authors-author_id',
            'books_authors',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `books`
        $this->dropForeignKey(
            'fk-books_authors-books_id',
            'books_authors'
        );

        // drops index for column `books_id`
        $this->dropIndex(
            'idx-books_authors-books_id',
            'books_authors'
        );

        // drops foreign key for table `authors`
        $this->dropForeignKey(
            'fk-books_authors-author_id',
            'books_authors'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            'idx-books_authors-author_id',
            'books_authors'
        );

        $this->dropTable('books_authors');
    }
}
