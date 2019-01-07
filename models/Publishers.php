<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publishers".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $description
 */
class Publishers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publishers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'description'], 'required'],
            [['description'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'image' => Yii::t('app', 'Image'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
