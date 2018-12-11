<?php

namespace app\modules\partner\controllers;
use app\models\Images_products;
use app\models\OrderProducts;
use app\models\Orders;
use app\models\Products;
use Yii;
use app\models\User;


class DefaultController extends AppPartnerController
{

    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        $user = User::findOne ($user_id);
        $orders = Orders::find ()->with (['order_products','order_status'])
            ->where (['card_id'=>$user->username])->asArray ()->all ();
        return $this->render('index',compact ( 'user','orders' ));
    }


    public function actionProduct(){
        $image_product = Images_products::find ()->where (['id'=>$_GET['id']])->one ();
        return $this->redirect(['/page/product','id'=> $image_product['id_prod']]);
    }

}
