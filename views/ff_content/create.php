<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ff_content */

$this->title = 'Create Ff Content';
$this->params['breadcrumbs'][] = ['label' => 'Ff Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
