<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Ff_valuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = app\models\Ff_instance::findOne($id)->name . ' - ' . 'Значения реквизитов';
$this->params['breadcrumbs'][] = ['label' => 'Дерево объектов', 'url' => ['ff_content/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-values-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить значение реквизита', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fields_id',
            'value',
            'dfrom',
            'dto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
