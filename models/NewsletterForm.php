<?php

namespace app\models;

use yii\base\Model;

class NewsletterForm extends Model
{
    public $email;

    public static function tableName()
    {
        return 'newsletter';
    }

    public function attributeLabels(){
        return [
            'email' => '',
        ];
    }

    public function rules(){
        return [
            ['email', 'email'],
        ];
    }

}