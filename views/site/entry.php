<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EntryForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?php echo $model->name[0];
    $models = $model->name;   
    foreach($models as $key => $n){
        Yii::info('test message 1 : ' . $key . ' ' . $n, 'my_category'); ?>
        
        <?= $form->field($model, '['.$key.']name['.$key.']')->label('Ваше имя'.$key) ?>

         
    <?php } ?>

    <?= $form->field($model, 'email')->label('Ваш Email') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        <?= Html::Button('Отменить', ['class' => 'btn btn-default', 'name' => 'reset-button', 'onclick' => "document.location.href = '/basic/web/index.php?r=site%2Findex';"])?>
    </div>

<?php ActiveForm::end(); ?>
