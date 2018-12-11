<?php

namespace app\models;
use yii\db\ActiveRecord;

class CallForm extends ActiveRecord
{
    public $verifyCode;

    public static function tableName()
    {
        return 'callback';
    }

    public function attributeLabels(){
        return [
            'name' => 'Ваше Имя',
            'phons' => 'Телефоны',
            'verifyCode' => 'Проверочный код',

        ];
    }

    public function rules(){
        return [
            [['name','phons'], 'required' ],
            ['verifyCode', 'captcha'],
        ];
    }

}