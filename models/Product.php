<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id_prod
 * @property string $photo
 * @property string $name
 * @property int $count
 * @property int $price
 * @property string $country
 * @property int $category
 * @property string $color
 * @property string $time
 *
 * @property Category $category0
 * @property Chart[] $charts
 * @property Order[] $orders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo', 'name', 'count', 'price', 'country', 'category', 'color'], 'required'],
            [['count', 'price', 'category'], 'integer'],
            [['time'], 'safe'],
            [['photo'], 'file', 'extensions' => ['png','jpg','gif'],'skipOnEmpty'=>false],
            [['name', 'country', 'color'], 'string', 'max' => 100],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category' => 'id_cate']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prod' => 'ID товара',
            'photo' => 'Фото',
            'name' => 'Наименование',
            'count' => 'Кол-во',
            'price' => 'Цена',
            'country' => 'Страна',
            'category' => 'Категория',
            'color' => 'Цвет',
            'time' => 'Время поставки',
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::class, ['id_cate' => 'category']);
    }

    /**
     * Gets query for [[Charts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharts()
    {
        return $this->hasMany(Chart::class, ['id_prod' => 'id_prod']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_prod' => 'id_prod']);
    }
}
