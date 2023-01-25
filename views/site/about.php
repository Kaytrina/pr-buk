<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <img style='max-height: 90px;' src='/logo/logo.jpg'/> - цветочная мастерская. Мы составим вам букет и композицию любой сложности с нежностью в каждом лепестке.
    </p>

    <?php $products=\app\models\Product::find()->orderBy(['time'=>SORT_DESC])->limit(5)->all();
    $items=[];

    foreach ($products as $product) {
        $items[]="<div class='bg-dark m-2 p-2 d-flex flex-column justify-content-center'>
        <h1 class='text-light text-center m-2'>{$product->name}</h1>
        <img class='m-auto w-50 ' style='max-height: 390px;' src='{$product->photo}' alt='photo'/>
        </div>";
    }
    echo yii\bootstrap5\Carousel::widget(['items'=>$items]);

    ?>


</div>
