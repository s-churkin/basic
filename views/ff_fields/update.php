<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ff_fields */

$this->title = 'Update Ff Fields: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ff Fields', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ff-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
