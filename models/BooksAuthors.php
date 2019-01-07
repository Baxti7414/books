<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books_authors".
 *
 * @property int $books_id
 * @property int $author_id
 *
 * @property Authors $author
 * @property Books $books
 */
class BooksAuthors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['books_id', /*'author_id'*/], 'required'],
            [['books_id', 'author_id'], 'integer'],
            [['books_id', 'author_id'], 'unique', 'targetAttribute' => ['books_id', 'author_id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['books_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['books_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'books_id' => Yii::t('app', 'Books ID'),
            'author_id' => Yii::t('app', 'Author ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Books::className(), ['id' => 'books_id']);
    }
}
