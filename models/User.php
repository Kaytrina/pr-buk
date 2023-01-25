<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $is_admin
 *
 * @property Chart[] $charts
 * @property Order[] $orders
 */

class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    public static function findIdentity($id_user)
    {
        return static::findOne($id_user);
    }

    public static function findIdentityByAccessToken($token, $type =
    null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id_user;
    }

    public function getAuthKey()
    {
        return;
    }

    public function validateAuthKey($authKey)
    {
        return;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findByLogin($login)
    {
        return self::find()->where(['login' => $login])->one();
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'required'],
            [['is_admin'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 100],
            [['login', 'email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Email',
            //'password' => 'Пароль',
            //'is_admin' => 'Is Admin',
        ];
    }

    /**
     * Gets query for [[Charts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCharts()
    {
        return $this->hasMany(Chart::class, ['id_user' => 'id_user']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id_user' => 'id_user']);
    }


}
