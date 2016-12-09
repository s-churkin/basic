<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ff_values */

$this->title = 'Значение реквизита';
$this->params['breadcrumbs'][] = ['label' => 'Дерево объектов', 'url' => ['ff_content/index']];
$this->params['breadcrumbs'][] = ['label' => 'Значения реквизитов', 'url' => ['index', 'id' => $model->instance_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-values-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Отмена', ['index', 'id' => $model->instance_id], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fields_id',
            'value',
            'dfrom',
            'dto',
        ],
    ]) ?>

</div>
