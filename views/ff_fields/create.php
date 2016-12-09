<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ff_fields */

$this->title = 'Создание реквизита';
$this->params['breadcrumbs'][] = ['label' => 'Дерево объектов', 'url' => ['ff_content/index']]; /*!!!*/
$this->params['breadcrumbs'][] = ['label' => app\models\Ff_content::findOne($id)->name . ' - ' . 'Реквизит', 'url' => ['index', 'id' => $model->content_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ff-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
