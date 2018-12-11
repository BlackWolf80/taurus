<?php


namespace app\controllers;
use app\models\Cards;
use app\models\Images_products;
use Yii;
use app\models\Orders;
use app\models\OrderProducts;
use app\models\Cart;


class CartController extends AppController
{

    public function actionAdd()
    {
        $id = Yii::$app->request->get ('id');
        $qty = (int)Yii::$app->request->get ('qty');
        $qty = !$qty ? 1 : $qty;

        $product = Images_products::find ()->with ('products')->where(['id'=>$id])->one ();

        if(empty($product)) return false;
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product,$qty);

        if(!Yii::$app->request->isAjax){
            return $this->redirect (Yii::$app->request->referrer);
        }

        $this->layout = false;

        return $this->render('cart-modal', compact('session','product'));
    }

    public function actionAddnm()
    {
        $id = Yii::$app->request->get ('id');
        $qty = (int)Yii::$app->request->get ('qty');
        $qty = !$qty ? 1 : $qty;

        $product = Images_products::find ()->with ('products')->where(['id'=>$id])->one ();

        if(empty($product)) return false;
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product,$qty);

        if(!Yii::$app->request->isAjax){
            return $this->redirect (Yii::$app->request->referrer);
        }

    }

    public function actionClear(){
        $session =Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }



    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session =Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow(){
        $session =Yii::$app->session;
        $session->open();
        $this->layout = false;

        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta ('Таурус маркет | корзина');

        $order = new Orders();
        $user_id = Yii::$app->user->id;

        $card = Cards::findOne ($user_id);
        $cards = Cards::find ()->asArray ()->all ();

        $order->card_id = $card['username'];


                    if($order->load (Yii::$app->request->post ())){
           $order->qty = $session['cart.qty'];
           $order->sum = $session['cart.sum'];
            if($order->card_id != null){$order->discount = ($order->sum * 10) /100 ;}
            else{$order->discount =null;}



           if($order->save ()){
               $this->saveOrderProducts ($session['cart'],$order->id,$order->points,$order->card_id);


               Yii::$app->session->setFlash ('success','Ваш заказ принят. 
                                                    Менеджер в ближайшее время свяжется с вами.');
               $admin_email= Yii::$app->params['adminEmail'];
                //сообщение клиенту
               $id_ord = 'Ваш заказ №'.$order->id.' в Taurus-market';
               Yii::$app->mailer->compose ('order', ['session' => $session,'order'=>$order])
                   ->setFrom ([$admin_email=>'Taurus-market'])
                   ->setTo ($order->email)
                   ->setSubject ($id_ord)
                   ->send ();
               //сообщение админу
               $id_ord = 'Заказ №'.$order->id;
               Yii::$app->mailer->compose ('order_admin', ['session' => $session,'order'=>$order])
                   ->setFrom ([$admin_email=>'Taurus-market'])
                   ->setTo ($admin_email)
                   ->setSubject ($id_ord)
                   ->send ();

               $orderNumber= $order->id;

               $session->remove('cart');
               $session->remove('cart.qty');
               $session->remove('cart.sum');
               //return $this->refresh();
               return $this->redirect(['payment/pay?id='.$orderNumber]);
           }
           else{Yii::$app->session->setFlash ('error','Ошибка сохранения заказа.');}
        }

        return $this->render('view',compact ('session','order','card','cards'));
    }


    protected function saveOrderProducts($items, $id_order,$points,$card_id){
        $all_sum = null;
        foreach ($items as $id => $item){
            $order_products = new OrderProducts();

            $order_products->id_order = $id_order;
            $order_products->id_product = $id;
            $order_products->price = $item['price'];
            $order_products->qty = $item['qty'];
            $order_products->name = $item['name'];
            $order_products->prod = $item['prod'];
            $order_products->img = $item['img'];
            $order_products->save();
            $query = (new \yii\db\Query())->select ( ['avalible','reserv'] )->from ( 'image_products' )->where ( ['id' => $id] )->one ();
            $ava = $query['avalible'] - $item['qty'] ; $res = $query['reserv'] + $item['qty'] ;
            Yii::$app->db->createCommand("UPDATE image_products SET avalible = $ava   WHERE id= $id")->execute();
            Yii::$app->db->createCommand("UPDATE image_products SET reserv = $res   WHERE id= $id")->execute();
            $all_sum = $all_sum+$order_products->price;
        }

        //вычитаем потраченые баллы
        if (!Yii::$app->user->isGuest){
            $user_id = Yii::$app->user->id;
            $card = Cards::findOne ($user_id);
            $points = $card->points - $points;
            Yii::$app->db->createCommand("UPDATE cards SET points = $points   WHERE id= $user_id")->execute();
        }
        //начисляем баллы за продажу
      /*  if($card_id!= null){
            $card = Cards::find ()->where (['username'=>$card_id])->one ();
            $points = $card->points + (($all_sum*10)/100);
            Yii::$app->db->createCommand("UPDATE cards SET points = $points   WHERE username= $card_id")->execute();}*/
    }
}