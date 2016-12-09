<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Ff_instanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = app\models\Ff_content::findOne($id)->name . ' - ' . 'Экземпляры';
$this->params['breadcrumbs'][] = ['label' => 'Дерево объектов', 'url' => ['ff_content/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-instance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать экземпляр', ['create', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'content_id',
            'name',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {values}',
                'buttons' => [
                    'values' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-barcode" title="Значения реквизитов"></span>', $url);
                    },
                ]
            ],
        ],
    ]); ?>
<?php
    /*
    <?= $this->registerJsFile('/basic/js/myfile.js'); ?>
     * 
     */
print '<style> .selected{ background: silver;} </style>';
$script = <<< JS
$(document).ready(function(){        
    $('table tr').on('click', function (e) {
        $('table').removeClass('table-striped');
        $('tr').removeClass();
        $(this).addClass('selected');
    });
    $('table tr').on('dblclick', function (e) {
    var message = encodeURIComponent($(this).find('td').eq(1).text());
    window.location.href = 'http://localhost/basic/web/index.php?r=ff_values%2Fupdate1&id='+message;        
        /*
        alert($(this).index());
        alert($(this).find('td').eq(1).text());
        */
    });
});
JS;
$this->registerJs($script);
?>
</div>
