<?php


use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Authors;


/* @var $this yii\web\View */
/* @var $model app\models\Books */
/* @var $author app\models\Authors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $authors = ArrayHelper::map(Authors::find()->all(), 'author_id', 'name'); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(array('rows'=>5, 'maxlength'=>true)) ?>

    <?= $form->field($model, 'authors', ['inputOptions' => ['id' => 'select_id']])->widget(Select2::class, [
        'data' => $authors,
        'options' => [
            'placeholder' => 'Select Author or Authors',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
