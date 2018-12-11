<?php

namespace app\models;

use yii\db\ActiveRecord;

class FeedbackForm extends ActiveRecord
{

    public $verifyCode;
    
    public static function tableName()
    {
        return 'feedback';
    }

    public function attributeLabels()
    {
        //установка атрибута lables
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст сообщения',
            'verifyCode' => 'Проверочный код',
        ];
    }

    public function rules(){
        return [
            [['name','text'],'required'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

}