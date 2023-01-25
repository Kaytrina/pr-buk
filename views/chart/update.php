<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Chart $model */
$id_user=Yii::$app->user->id;

$this->title = 'Редактирование товара' ;
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['chart/index?ChartSearch[id_chart]=&ChartSearch[id_user]='.$id_user]];
//$this->params['breadcrumbs'][] = ['label' => $model->id_chart, 'url' => ['view', 'id_chart' => $model->id_chart]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="chart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
