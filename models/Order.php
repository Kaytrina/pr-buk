<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id_ord
 * @property int $id_chart
 * @property int $id_user
 * @property int $id_prod
 * @property int $count
 * @property string $time
 * @property string $status
 * @property string $reason
 *
 * @property Chart $chart
 * @property Product $prod
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_chart', 'id_user', 'id_prod', 'count', 'reason'], 'required'],
            [['id_chart', 'id_user', 'id_prod', 'count'], 'integer'],
            [['time'], 'safe'],
            [['status'], 'string'],
            [['reason'], 'string', 'max' => 100],
            [['id_chart'], 'exist', 'skipOnError' => true, 'targetClass' => Chart::class, 'targetAttribute' => ['id_chart' => 'id_chart']],
            [['id_prod'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_prod' => 'id_prod']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ord' => 'ID заказа',
            'id_chart' => 'ID корзины',
            'id_user' => 'ID пользователя корзины',
            'id_prod' => 'ID товара',
            'count' => 'Кол-во',
            'time' => 'Время создания',
            'status' => 'Статус',
            'reason' => 'Комментарий',
        ];
    }

    /**
     * Gets query for [[Chart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChart()
    {
        return $this->hasOne(Chart::class, ['id_chart' => 'id_chart']);
    }

    /**
     * Gets query for [[Prod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProd()
    {
        return $this->hasOne(Product::class, ['id_prod' => 'id_prod']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'id_user']);
    }
}
