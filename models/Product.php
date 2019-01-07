<?php
/**
 * Created by PhpStorm.
 * User: ucer
 * Date: 22.09.2018
 * Time: 17:23
 */
namespace app\models;
use yii\db\ActiveRecord;


class Product extends ActiveRecord{
    public static function tableName(){
        return 'product';
    }
    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}