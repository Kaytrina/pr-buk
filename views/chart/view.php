<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Chart $model */

$this->title = $model->id_chart;
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chart-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id_chart' => $model->id_chart], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_chart' => $model->id_chart], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот товар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_chart',
            'id_user',
            'id_prod',
            'count',
        ],
    ]) ?>

</div>
