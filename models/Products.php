<?php
namespace app\models;
use \yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function getImage_products()
    {
        return $this->hasMany (Images_products::className (),['id_prod'=>'id']);
    }

    public function getProperty()
    {
        return $this->hasMany(Property::className(),['product_id'=>'id']);
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className(),['product_id'=>'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(),['id'=>'category_id']);
    }
}