<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* * *ext** */
use leandrogehlen\treegrid\TreeGrid;
/*
 * Использован TreeGrid jQuery plugin: http://maxazan.github.io/jquery-treegrid/
 */

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rpg\models\TreeSearch !!!*/
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дерево объектов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tree-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if ($dataProvider->count == 0)
            echo Html::a('Create root element', ['add'], ['class' => 'btn btn-success']);
        ?>
    </p>
    <?=
    TreeGrid::widget([
        'dataProvider' => $dataProvider,
        'keyColumnName' => 'id',
        'showOnEmpty' => FALSE,
        'parentColumnName' => 'tree_id',
        'columns' => [
            'name',
            'id',
            'tree_id',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {add} {labels} {instance}',
                'buttons' => [
                    'add' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-plus" title="Добавить объект"></span>', $url);
                    },
                    'labels' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-list-alt" title="Реквизиты объекта"></span>', $url);
                    },
                    'instance' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-barcode" title="Экземпляры объекта"></span>', $url);
                    },
                ]
            ],
        ]
    ]);
    ?>

</div>
