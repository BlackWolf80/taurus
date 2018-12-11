<?php
namespace app\models;
use \yii\db\ActiveRecord;

class Property extends ActiveRecord
{
    public static function tableName()
    {
        return 'property';
    }

    public function getProducts()
    {
        return $this->hasOne(Products::className(),['id'=>'product_id']);
    }


}