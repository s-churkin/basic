<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ff_fields */
/* @var $form yii\widgets\ActiveForm */
/* https://nix-tips.ru/yii2-polya-activeform.html */
?>

<div class="ff-fields-form">

    <?php $form = ActiveForm::begin(); ?>
<!--
    <?= $form->field($model, 'id')->textInput() ?>
-->
    <?= $form->field($model, 'content_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'not_null')->checkbox([
        /* 'label' => 'Неактивный чекбокс', */
        'labelOptions' => [
            'style' => 'padding-left:20px;'
        ],
        'disabled' => false
    ]); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'Строка' => 'Строка', 'Дата' => 'Дата', 'Число' => 'Число', 'Сумма' => 'Сумма', 'Логическое' => 'Логическое', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
