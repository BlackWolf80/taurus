<?php
namespace app\models;
use yii\db\ActiveRecord;

class Wish extends ActiveRecord {

    public function addToWish($product, $qty = 1){
        if(isset($_SESSION['wish'][$product->id])){

        }else{
            $_SESSION['wish'][$product->id] = [
                'name' => $product->name,
                'prod' => $product->products->name,
                'prod_id' => $product->products->id,
                'price' => $product->price,
                'img' => $product->img,
            ];
        }
    }


    public function recalc($id){
//        if(!isset($_SESSION['wish'][$id])) return false;
//        $qtyMinus = $_SESSION['wish'][$id]['qty'];
//        $sumMinus = $_SESSION['wish'][$id]['qty'] * $_SESSION['wish'][$id]['price'];
//        $_SESSION['wish.qty'] -= $qtyMinus;
//        $_SESSION['wish.sum'] -= $sumMinus;
        unset($_SESSION['wish'][$id]);
    }


}