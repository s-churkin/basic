<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ff_values1; /**/

$this->title = 'Значения реквизитов';
$this->params['breadcrumbs'][] = ['label' => 'Дерево объектов', 'url' => ['ff_content/index']]; 
$this->params['breadcrumbs'][] = ['label' => app\models\Ff_content::findOne($model->content_id)->name . ' - ' . 'Экземпляры', 'url' => ['ff_instance/index', 'id' => $model->content_id]];
$this->params['breadcrumbs'][] = $this->title;
 
?>
    <?php $form = ActiveForm::begin(); ?>
    <?php
    foreach($model->values as $key => $value){
        Yii::info('test message update1 : ' . $key . ' ', 'my_category'); ?>
        
        <?= $form->field($model, '['.$key.']values['.$key.']')->label($model->labels[$key]) ?>
         
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        <?= Html::Button('Отменить', ['class' => 'btn btn-default', 'name' => 'reset-button', 'onclick' => "document.location.href = '/basic/web/index.php?r=ff_instance%2Findex&id=$model->content_id';"])?>
    </div>

<?php ActiveForm::end(); ?>
