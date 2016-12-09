<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ff_fieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = app\models\Ff_content::findOne($id)->name . ' - ' . 'Реквизиты';
$this->params['breadcrumbs'][] = ['label' => 'Дерево объектов', 'url' => ['ff_content/index']]; /*!!!*/
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить реквизит', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*
        'filterModel' => $searchModel,
         * 
         */
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'content_id',
            'name',
            'not_null',
            'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
