<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Publishers;


$publishers = Publishers::find()->all();
/* @var $this yii\web\View */
/* @var $searchModel app\models\PublishersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Publishers');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <h1 style="font-size: 40px;margin-top: 50px;text-align: center !important;"><b>Nashriyotlar</b></h1>
    <div class="container posconent">
        <div id="slidera1" >
            <!----------------------------------><?foreach($publishers as $publisher):?>
                <div class="slidera22">
                    <div class="slide_p4">
                        <div class="posgend">
                            <a href="site/book/?id=" class="linkpostger">
                                <img class="imgspostg" src="/images/<?=$book->image?>" style="height: 145px;"/>
                                <div class="textpostg"><?=$publisher->name?></div>
                            </a>
                            <div class="mon1pos"><div class="monpostg"></div></div>
                            <div class="autors">
                            </div>
                        </div>
                    </div>
                </div>
            <!----------------------------------><?endforeach;?>
        </div>


        <style>
            .imgspostg{
                border: 1px solid #fafafa;
                box-shadow: 4px 4px 4px;
                color: #cccccc;
                border-radius: 4px;
                background-color: #ffffff;
            }
        </style>

    </div>