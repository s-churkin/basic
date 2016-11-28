<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
?>
<?= Html::encode($message) ?>
<br>
<?= $var ?>
<br>
<?= __FILE__ ?>
<?=
Alert::widget([
    'options' => [
        'class' => 'alert-info'
    ],
    'body' => '<b>!!!</b>, alert-info'
]);

?>

