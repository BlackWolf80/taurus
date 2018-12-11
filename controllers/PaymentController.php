<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 25.12.17
 * Time: 15:18
 */

namespace app\controllers;
use app\models\Orders;
use app\models\OrderProducts;
use app\models\Images_products;
use app\models\Categories;
use Yii;


class PaymentController extends AppController{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionFail(){
        $categories = Categories::find()->asArray()->all();
        $request = Yii::$app->request;
        $inv_id = $request->post('inv_id');

        Yii::$app->session->setFlash ('error','Ваш заказ № '.$inv_id.' - не был оплачен.');

        return $this->render ('fail',compact ('inv_id1','categories'));
    }
    public function actionResult(){
        $request = Yii::$app->request;
        $inv_id = $request->post('inv_id');

        return $this->render ('result');
    }
    public function actionSuccess(){
        $categories = Categories::find()->asArray()->all();
        $request = Yii::$app->request;
        $inv_id = $request->post('inv_id');

        Yii::$app->session->setFlash ('success','Ваш заказ № '.$inv_id.' - успешно оплачен.
            Наш менеджер свяжется с вами в ближайшее время');

        return $this->render ('success',compact ('categories'));
    }
    public function actionPay(){

        $id= $_GET['id'];

        $order=Orders::find ()->where (['id'=>$id])->with ('order_products')->all ();
        foreach ($order as $item){}

        if($item['debit'] !=0){return $this->redirect(['page/catalog']);}
        else{
            Yii::$app->session->setFlash ('success','Ваш заказ № '.$id.' принят.');
            return $this->render ('pay',compact ('id','order'));
        }
    }



    public function actionRes(){

        if (isset($_GET['den'])&&$_GET['den'] == "0"){

            $categories = Categories::find()->asArray()->all();

            if(isset($_GET['id'])&& $_GET['id'] != ""){
                $model_id=$_GET['id'];
                $order=Orders::find ()->where (['id'=>$_GET['id']])->with ('order_products')->one ();
                $ord_prods = OrderProducts::find()->where(['id_order' =>$model_id ])->asArray()->all();

                if ($order->points != null){
                    $card = Cards::find()->where(['username'=>$order->card_id])->one();
                    $val = $order->points + $card['points']-$order->discount;
                    Yii::$app->db->createCommand("UPDATE cards SET points = $val   WHERE username = $order->card_id")->execute();
                }
                Yii::$app->db->createCommand("UPDATE orders SET debit = 2   WHERE id=  $model_id")->execute();
                Yii::$app->db->createCommand("UPDATE orders SET status = 4   WHERE id=  $model_id")->execute();
                foreach ($ord_prods as $items){
                    $id = $items['id_product'];
                    $res_img = Images_products::findOne($items['id_product']);
                    $res = $res_img['reserv'] - $items['qty'];
                    $ava = $res_img['avalible'] + $items['qty'];
                    Yii::$app->db->createCommand("UPDATE image_products SET avalible = $ava   WHERE id= $id")->execute();
                    Yii::$app->db->createCommand("UPDATE image_products SET reserv = $res   WHERE id= $id")->execute();
                }
                Yii::$app->session->setFlash ('error','Ваш заказ № '.$_GET['id'].'- удален.');
                return $this->render ('no',compact('categories'));
            }
            else{throw  new yii\web\HttpException( 404 , 'Такой  заказ не существует' );}


        }
        elseif(isset($_GET['den'])&&$_GET['den'] == "1"){


            $categories = Categories::find()->asArray()->all();
            Yii::$app->session->setFlash ('success','Ваш заказ № '.$_GET['id'].'- успешно оформлен.
            Наш менеджер свяжется с вами в ближайшее время');
            return $this->render ('ok',compact('categories'));
        }
        else{return $this->redirect(['page/catalog']);}

    }


}
