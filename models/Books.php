<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $text
 * @property string $image
 * @property string $file
 * @property int $cost
 * @property int $status
 * @property string $year
 * @property string $created_time
 *
 * @property BooksAuthors[] $booksAuthors
 * @property Genre[] $authors
 * @property BooksGenre[] $booksGenres
 * @property Genre[] $genres
 * @property Publishers[] $publishers
 * @property Cart[] $carts
 * @property OrderItems[] $orderItems
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['cost', 'cost2', 'status'], 'integer'],
            [['name'/*, 'description', 'text'*/], 'required'],
            [['created_time', 'image', 'file'], 'safe'],
            [['name', 'description', 'image', 'file', 'year'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'text' => Yii::t('app', 'Text'),
            'image' => Yii::t('app', 'Image'),
            'file' => Yii::t('app', 'File'),
            'cost' => Yii::t('app', 'Cost'),
            'cost2' => Yii::t('app', 'Electron Cost'),
            'status' => Yii::t('app', 'Status'),
            'year' => Yii::t('app', 'Year'),
            'created_time' => Yii::t('app', 'Created Time'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                Yii::$app->session->setFlash('success', 'Книга добавлена!');
                $this->created_time = date('Y-m-d H:i:s');
            } else {
                Yii::$app->session->setFlash('success', 'Книга обновлена!');
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksAuthors()
    {
        return $this->hasMany(BooksAuthors::className(), ['books_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->viaTable('books_authors', ['books_id' => 'id']);
    }

    public function getBooksPublishers()
    {
        return $this->hasMany(BooksPublishers::className(), ['books_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublishers()
    {
        return $this->hasMany(Publishers::className(), ['id' => 'publisher_id'])->viaTable('books_publishers', ['books_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooksGenres()
    {
        return $this->hasMany(BooksGenre::className(), ['books_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('books_genre', ['books_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['book_id' => 'id']);
    }
}
