<?php
/**
 * Created by PhpStorm.
 * User: ucer
 * Date: 22.09.2018
 * Time: 17:23
 */
namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord{
    public static function tableName(){
        return 'category';
    }
    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

}