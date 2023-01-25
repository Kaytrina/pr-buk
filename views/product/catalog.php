<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title; ?>
<h1>Каталог товаров</h1>

<div class="btn-group m-1">
    <button class="btn btn-light btn-sm dropdown-toggle border border-1 border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Цена</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="catalog?sort=price">По возрастанию</a></li>
        <li><a class="dropdown-item" href="catalog?sort=-price">По убыванию</a></li>
    </ul>
</div>

<div class="btn-group m-1">
    <button class="btn btn-light btn-sm dropdown-toggle border border-1 border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Период поставки</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="catalog?sort=-time">Новые</a></li>
        <li><a class="dropdown-item" href="catalog?sort=time">Старые</a></li>
    </ul>
</div>

<div class="btn-group m-1">
    <button class="btn btn-light btn-sm dropdown-toggle border border-1 border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Страна поставщика</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="catalog?sort=country">По возрастанию (А-Я)</a></li>
        <li><a class="dropdown-item" href="catalog?sort=-country">По убыванию (Я-А)</a></li>
    </ul>
</div>

<div class="btn-group m-1">
    <button class="btn btn-light btn-sm dropdown-toggle border border-1 border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Фильтр по названию</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="catalog?sort=name">По возрастанию (А-Я)</a></li>
        <li><a class="dropdown-item" href="catalog?sort=-name">По убыванию (Я-А)</a></li>
    </ul>
</div>

<div class="btn-group m-1">
    <button class="btn btn-light btn-sm dropdown-toggle border border-1 border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Категория</button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="catalog?ProductSearch[category]=1">Цветы</a></li>
        <li><a class="dropdown-item" href="catalog?ProductSearch[category]=2">Букеты</a></li>
        <li><a class="dropdown-item" href="catalog?ProductSearch[category]=3">Открытки</a></li>
        <li><a class="dropdown-item" href="catalog?ProductSearch[category]=4">Дополнительно</a></li>
    </ul>
</div>

<?php $products=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start border border-1 border-light align-items-end'>";
foreach ($products as $product) {
    if ($product->count>0) {
        echo "<div class='card m-1' style='width: 22%; min-width: 300px;'>
        <a href='/product/view?id_prod={$product->id_prod}'><img src='{$product->photo}' class='card-img-top' style='max-height: 300px; min-height: 300px;' alt='photo'></a>
        <div class='card-body'>
        <h5 class='card-title'>{$product->name}</h5>
       
         <p class='text-danger'>{$product->price} руб</p>";
        echo (Yii::$app->user->isGuest ? "<a href='/product/view? id_prod={$product->id_prod}' class='btn btn-success'>Просмотр товара</a>":
            "<p onclick='add_product({$product->id_prod},1)' class='btn btn-success'>Добавить в корзину</p>");
        echo "</div>
</div>";}
}
echo "</div>";
?>

