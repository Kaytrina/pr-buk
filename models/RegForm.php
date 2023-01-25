<?php
namespace app\models;

use Yii;

class RegForm extends User
{
    public $confirm_password;
    public $agree;

    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'login', 'email', 'password', 'confirm_password', 'agree'], 'required'],
            [['is_admin'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 100],
            [['login', 'email'], 'unique'],
            [['name', 'surname', 'patronymic'], 'match', 'pattern'=>'/^[А-ЯЁа-яё]{4,}/u', 'message'=>'Используйте минимум 5 русских букв'],
            [['password'], 'match', 'pattern'=>'/^[A-Za-z0-9]{5,}/', 'message'=>'Используйте минимум 5 латинских букв и цифр'],
            [['email'], 'email'],
            [['confirm_password'], 'compare', 'compareAttribute'=>'password'],
            [['agree'], 'compare', 'compareValue'=>true, 'message'=>''],
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
            'password' => 'Пароль',
            'is_admin' => 'Is Admin',
            'confirm_password' => 'Повторите пароль',
            'agree' => 'Подтвердите согласие на обработку персональных
данных',
        ];
    }
}
