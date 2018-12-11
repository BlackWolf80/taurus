<?php
namespace app\models;
use \yii\db\ActiveRecord;

class OrderProducts extends ActiveRecord
{
    public static function tableName()
    {
        return 'order_products';
    }

    public function getProducts()
    {
        return $this->hasMany(Products::className(),['product_id'=>'id']);
    }

    public function rules()
    {
        return [
            [['id_order', 'id_product', 'qty', 'price'], 'required'],
            [['qty'], 'integer'],
        ];
    }


    public function getOrders(){
        return $this->hasOne (Orders::className (),['id' => 'id_order']);
    }

    public function getImage_products(){
        return $this->hasOne (Images_products::className (),['id' => 'id_product']);
    }
}