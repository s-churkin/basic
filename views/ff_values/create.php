<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ff_values */

$this->title = 'Create Ff Values';
$this->params['breadcrumbs'][] = ['label' => 'Ff Values', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-values-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
