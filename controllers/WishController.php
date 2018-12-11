<?php
namespace app\controllers;
use app\models\Images_products;
use Yii;
use app\models\Orders;
use app\models\OrderProducts;
use app\models\Wish;



class WishController extends AppController
{

    public function actionAdd()
    {
        $id = Yii::$app->request->get ('id');

        $product = Images_products::find ()->with ('products')->where(['id'=>$id])->one ();

        if(empty($product)) return false;
        $session =Yii::$app->session;
        $session->open();
        $wish = new Wish();
        $wish->addToWish($product);

        if(!Yii::$app->request->isAjax){
            return $this->redirect (Yii::$app->request->referrer);
        }
        $this->layout = false;

        return $this->render('wish_list', compact('session','product'));
    }

    public function actionShow(){
        $session =Yii::$app->session;
        $session->open();
        $this->layout = false;

        return $this->render('wish_list', compact('session'));
    }


    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $wish = new Wish();
        $wish->recalc($id);
        $this->layout = false;
        return $this->render('wish_list', compact('session'));
    }

    public function actionClear(){
        $session =Yii::$app->session;
        $session->open();
        $session->remove('wish');
        $this->layout = false;
        return $this->render('wish_list', compact('session'));
    }


    //список желаний
    public function actionWish_list()
    {
        $this->setMeta ('Таурус маркет | списоск пожеланий');
        return $this->render('wish_list');
    }

}