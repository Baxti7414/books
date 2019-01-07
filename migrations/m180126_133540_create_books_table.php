<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books`.
 * Has foreign keys to the tables:
 *
 * - `authors`
 */
class m180126_133540_create_books_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'text' => $this->text(),
            'image' => $this->string(),
            'file' => $this->string(),
            'cost' => $this->integer(),
            'status' => $this->integer(),
            'year' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('books');
    }
}
