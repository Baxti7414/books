<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $book_id
 * @property int $status
 * @property int $quantity
 * @property string $created_time
 *
 * @property Books $book
 * @property User $order
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'book_id'], 'required'],
            [['order_id', 'book_id', 'status', 'quantity'], 'integer'],
            [['created_time'], 'safe'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'book_id' => Yii::t('app', 'Book ID'),
            'status' => Yii::t('app', 'Status'),
            'quantity' => Yii::t('app', 'Quantity'),
            'created_time' => Yii::t('app', 'Created Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Books::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(User::className(), ['id' => 'order_id']);
    }
}
