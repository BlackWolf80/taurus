<?php
namespace app\models;
use \yii\db\ActiveRecord;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Orders extends ActiveRecord
{
    public $verifyCode;

    public static function tableName()
    {
        return 'orders';
    }

    public function getProducts()
    {
        return $this->hasOne(Products::className(),['id'=>'product_id']);
    }

    public function getCards()
    {
        return $this->hasOne(Cards::className(),['username'=>'card_id']);
    }

    public function getOrder_products(){
        return $this->hasMany (OrderProducts::className (),['id_order' => 'id']);
    }

    public function getOrder_status()
    {
        return $this->hasOne(OrderStatus::className(),['id'=>'status']);
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'last_name' => 'Фамилия',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'date' => 'Дата',
            'points' => 'использовать бонусных баллов',
            'card_id' => '',
            'verifyCode' => 'Проверочный код',
        ];
    }


    public function rules()
    {
        return [
            [[ 'name', 'last_name', 'phone', 'email'], 'required'],
            [['date'], 'safe'],
            [['status', 'qty'], 'integer'],
            [['sum'], 'number'],
            [['id'], 'string', 'max' => 15],
            [['name', 'last_name', 'email'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 20],
            [['email'],'email'],
            [['points'],'integer'],
            ['verifyCode', 'captcha'],
            ['card_id', 'validateCards'],
        ];
    }


    public function validateCards($attribute)
    {

        $cards = Cards::find ()->asArray()->all();
        $i=0;
        foreach ($cards as $crd)
        {
            $name[$i] = $crd['username'];
            $i++;
        }
//            \app\controllers\debug ($name);
        if(!in_array ( $this->$attribute , $name )){
            $this->addError ( $attribute , 'Вы ввели неверный промокод.' );
        }



    }

    public  function behaviors()
    {

        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];

    }

}