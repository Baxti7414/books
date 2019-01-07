<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Authors;
use app\models\Genre;
use app\models\Publishers;


/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $form yii\widgets\ActiveForm */
$statuses = [1=>'Активный', 0=>'Не активный'];
$authors = ArrayHelper::map(Authors::find()->all(), 'id', 'fio');
$genres = ArrayHelper::map(Genre::find()->all(), 'id', 'name');
$publishers = ArrayHelper::map(Publishers::find()->all(), 'id', 'name');
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'status')->dropdownList($statuses) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?
      echo $form->field($model, 'authors')->widget(Select2::classname(), [
          'data' => $authors,
          'language' => 'ru',
          'options' => ['multiple' => true, 'placeholder' => 'Muallifni tanlang ...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]);
    ?>

    <?
    echo $form->field($model, 'genres')->widget(Select2::classname(), [
        'data' => $genres,
        'language' => 'ru',
        'options' => ['multiple' => true, 'placeholder' => 'Janrni tanlang ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?><?
    echo $form->field($model, 'publishers')->widget(Select2::classname(), [
        'data' => $publishers,
        'language' => 'ru',
        'options' => ['multiple' => true, 'placeholder' => 'Nashriyotni tanlang ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
