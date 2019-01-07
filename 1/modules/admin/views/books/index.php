<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BooksSerach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a(Yii::t('app', 'Create Books'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Создать книгу с автором'), ['create2'], ['class' => 'btn btn-primary ']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'text:ntext',
            'image',
            'cost',
            'cost2',
            //'status',
            'year',
            //'author_id',
            'created_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>