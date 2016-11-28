<?php
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $randomString string */
/* @var $randomKey string */
$this->title = 'Yii2 и Pjax: Две ссылки и два объекта на одной странице';
$this->params['breadcrumbs'][] = ['label' => 'Yii2 и Pjax', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="row">
<div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Новая случайная строка", ['/yii2pjax/multiple'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomString ?></h3>
    <?php Pjax::end(); ?>
</div>

<div class="col-sm-12 col-md-6">
    <?php Pjax::begin(); ?>
    <?= Html::a("Новый случайный ключ", ['/yii2pjax/multiple'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h3><?= $randomKey ?><h3>
    <?php Pjax::end(); ?>
</div>

    </div>



    <hr />
    <p>Представление views\site\multiple.php:<br>
        <pre style="background:rgba(238,238,238,0.92);color:#000">&lt;div class="col-sm-12 col-md-6">
    &lt;?php <span style="color:#33f;font-weight:700">Pjax</span><span style="color:#00f">::</span>begin(); ?>
    &lt;?= <span style="color:#33f;font-weight:700">Html</span><span style="color:#00f">::</span>a(<span style="color:#093">"Новая случайная строка"</span>, [<span style="color:#093">'site/multiple'</span>], [<span style="color:#093">'class'</span> <span style="color:#00f">=></span> <span style="color:#093">'btn btn-lg btn-primary'</span>]) ?>
    &lt;h3>&lt;?= $randomString ?>&lt;/h3>
    &lt;?php <span style="color:#33f;font-weight:700">Pjax</span><span style="color:#00f">::</span>end(); ?>
&lt;/div>

&lt;div class="col-sm-12 col-md-6">
    &lt;?php <span style="color:#33f;font-weight:700">Pjax</span><span style="color:#00f">::</span>begin(); ?>
    &lt;?= <span style="color:#33f;font-weight:700">Html</span><span style="color:#00f">::</span>a(<span style="color:#093">"Новый случайный ключ"</span>, [<span style="color:#093">'site/multiple'</span>], [<span style="color:#093">'class'</span> <span style="color:#00f">=></span> <span style="color:#093">'btn btn-lg btn-primary'</span>]) ?>
    &lt;h3>&lt;?= $randomKey ?>&lt;h3>
    &lt;?php <span style="color:#33f;font-weight:700">Pjax</span><span style="color:#00f">::</span>end(); ?>
&lt;/div>
</pre>
    <br>Контроллер controllers\SiteController.php:<br>
    <pre style="background:rgba(238,238,238,0.92);color:#000">
<span style="font-weight:700">public </span><span style="font-weight:700">function</span> <span style="color:#ff8000">actionMultiple</span>()
{
    $security <span style="color:#00f">=</span> <span style="color:#00f">new</span> <span style="color:#33f;font-weight:700">Security</span>();
    $randomString <span style="color:#00f">=</span> $security<span style="color:#00f">-></span>generateRandomString();
    $randomKey <span style="color:#00f">=</span> $security<span style="color:#00f">-></span>generateRandomKey();
<span style="color:#00f">    return</span> $this<span style="color:#00f">-></span>render(<span style="color:#093">'multiple'</span>, [
        <span style="color:#093">'randomString'</span> <span style="color:#00f">=></span> $randomString,
        <span style="color:#093">'randomKey'</span> <span style="color:#00f">=></span> $randomKey,
    ]);
}

</pre>

</div>

