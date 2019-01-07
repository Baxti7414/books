<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'text:ntext',
            [
                'attribute' => 'image',
                'value' => Html::img('/'.$model->image),
                'format' => 'html',
            ],
            [
                'attribute' => 'file',
                'value' => Html::a('Fayl', '/'.$model->file),
                'format' => 'html',
            ],
            'cost',
            'cost2',
            'status',
            'year',
            'created_time',
        ],
    ]) ?>

    <div class="container">

        <div class="row">
            <h2>Muallif</h2>
            <?foreach ($model->authors as $author):?>
                <?=Html::a($author->fio, Url::to(['/admin/authors/view', 'id' => $author->id]), ['class' => 'badge']);?>
            <?endforeach;?>
        </div>

        <div class="row">
            <h2>Janrlar</h2>
            <?foreach ($model->genres as $genre):?>
                <?=Html::a($genre->name, Url::to(['/admin/genre/view', 'id' => $genre->id]), ['class' => 'badge']);?>
            <?endforeach;?>
        </div>
        <div class="row">
            <h2>Janrlar</h2>
            <?foreach ($model->publishers as $publisher):?>
                <?=Html::a($publisher->name, Url::to(['/admin/publisher/view', 'id' => $publisher->id]), ['class' => 'badge']);?>
            <?endforeach;?>
        </div>
    </div>
</div>
