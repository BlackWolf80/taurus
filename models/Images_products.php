<?php
namespace app\models;
use \yii\db\ActiveRecord;

class Images_products extends ActiveRecord
{
    public static function tableName()
    {
        return 'image_products';
    }
    public function getProducts()
    {
        return $this->hasOne(Products::className(),['id'=>'id_prod']);
    }
}