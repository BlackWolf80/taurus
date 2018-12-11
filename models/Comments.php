<?php
namespace app\models;
use \yii\db\ActiveRecord;

class Comments extends ActiveRecord
{

    public $verifyCode;

    public static function tableName()
    {
        return 'comments';
    }

    public function getProducts()
    {
        return $this->hasOne(Products::className(),['id'=>'product_id']);
    }

    public function attributeLabels(){
        return [
            'product_id' => '',
            'comment_date' => '',
            'user_name' => 'Ваше Имя',
            'email' => 'E-mail',
            'comment_text' => 'Отзыв',
            'verifyCode' => 'Проверочный код',

        ];
    }

    public function rules(){
        return [
            [['user_name','comment_text'], 'required' ],
            ['verifyCode', 'captcha'],
        ];
    }

}