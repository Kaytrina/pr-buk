<?php

use app\models\Chart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ChartSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_chart',
            //'id_user',
            //'id_prod',
            ['attribute'=>'Наименование товара', 'value'=> function($data){return
                $data->getProd()->One()->name;}],
            ['attribute'=>'Стоимость', 'value'=> function($data){return
                $data->getProd()->One()->price;}],
            'count',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Chart $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_chart' => $model->id_chart]);
                 }
            ],
        ],
    ]); ?>

<?php
//if (Yii::$app->user->identity->is_admin==0)
$charts = Chart::find()->where(['id_user'=>Yii::$app->user->identity->id_user])->all();
if (!$charts) return false;
foreach ($charts as $chart)
{
    $order=new \app\models\Order();
    $order-> id_user=Yii::$app->user->identity->id_user;
    $order->id_prod=$chart->id_prod;
    $order->count=$chart->count;
    $order->save(false);
    $chart->delete();

}
echo "<p>",
Html::a('Оформить заказ', ['onclick=add_chart({$chart->id_chart})'], ['class' => 'btn btn-success']),
//onclick='add_chart({$chart->id_chart})' class='btn btn-success'>Оформить заказ"</p>";
    //echo"<p>",
    //Html::a('Оформить заказ', [''], ['class' => 'btn btn-success']),
    "</p>"
?>

</div>
