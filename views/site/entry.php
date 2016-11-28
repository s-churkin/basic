<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Ваше имя') ?>
    <?= $form->field($model, 'email')->label('Ваш Email') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        <?= Html::Button('Отменить', ['class' => 'btn btn-default', 'name' => 'reset-button', 'onclick' => "document.location.href = '/basic/web/index.php?r=site%2Findex';"])?>
    </div>

<?php ActiveForm::end(); ?>
