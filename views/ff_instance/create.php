<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ff_instance */

$this->title = 'Create Ff Instance';
$this->params['breadcrumbs'][] = ['label' => 'Ff Instances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-instance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
