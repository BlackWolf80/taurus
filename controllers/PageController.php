<?php

namespace app\controllers;

use app\models\Filters;
use app\models\Property;
use Yii;
use app\models\Callback;
use app\models\Comments;
use app\models\Newsletter;
use app\models\Categories;
use app\models\News;
use app\models\Images_products;
use app\models\Products;
use app\models\CallForm;
use app\models\Feeback;
use app\models\FeedbackForm;
use yii\data\Pagination;
use yii\helpers\Url;



//контроллер страниц
class PageController extends AppController
{

    //список продуктов сетка
    public function actionListproducts()
    {

        if(isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'],FILTER_VALIDATE_INT)) {

            $categories = Categories::find ()->where ( ['id' => $_GET['id']] )->asArray ()->one ();
            if (empty( $categories )) {

                throw  new yii\web\HttpException( 404 , 'Такая категория не существует' );
            }

            $query = Products::find ()->where ( ['category_id' => $_GET['id']] )->andWhere ( ['status' => 1] );
            $pages = new Pagination( ['totalCount' => $query->count () , 'pageSize' => 12] );

            $products = $query->offset ( $pages->offset )->limit ( $pages->limit )->asArray ()->all ();

            if (count ( $categories ) > 0)
                $this->setMeta ( 'Таурус маркет | каталог | ' . $categories['name'] , $categories['keywords'] , $categories['description'] );

                return $this->render ( 'listproducts' , compact ( 'categories' , 'products' , 'pages','session') );

        }
        return $this->redirect(['page/catalog']);

    }

    protected function SortGroup1($group){
        $type1=$type2=$type3=$type4=$type5=$type6=$type7=$type8 = [];
        if($group['1'] == true){$type1 =Property::find ()->with ('products')->where   (['value' => 'круглая'])->asArray ()->all (); }
        if($group['2'] == true){$type2 =Property::find ()->with ('products')->where   (['value' => 'прямоугольная'])->asArray ()->all (); }
        if($group['3'] == true){$type3 =Property::find ()->with ('products')->where   (['value' => 'квадратная'])->asArray ()->all (); }
        if($group['4'] == true){$type4 =Property::find ()->with ('products')->where   (['value' => 'овальная'])->asArray ()->all (); }
        if($group['5'] == true){$type5 =Property::find ()->with ('products')->where   (['value' => 'угловая'])->asArray ()->all (); }
        if($group['6'] == true){$type6 =Property::find ()->with ('products')->where   (['value' => 'с крылом'])->asArray ()->all (); }
        if($group['7'] == true){$type7 =Property::find ()->with ('products')->where   (['name' => 'Ревресивность'])
            ->andWhere (['value' => 'Да'])->asArray ()->all (); }
        if($group['8'] == true){$type8 =Property::find ()->with ('products')->where   (['name' => 'Количество секций'])
            ->andWhere (['value' => '2'])->asArray ()->all (); }
        $property=array_merge ($type1,$type2);
        $property=array_merge ($property,$type3);
        $property=array_merge ($property,$type4);
        $property=array_merge ($property,$type5);
        $property=array_merge ($property,$type6);
        $property=array_merge ($property,$type7);
        $property=array_merge ($property,$type8);
        $property2 = [];


        foreach ($property as $items){
            $property2 = array_merge ($property2,Products::find ()
                ->with ('property')
                ->where (['name'=>$items['products']['name'] ])
                ->asArray()
                ->all ());}

        return $property2;
    }

    protected function SortGroup2($group){
        $type40=$type45=$type50=$type60=$type70=$type80 = [];
       if($group['40'] == true){$type40 =Property::find ()->with ('products')->where   (['name' => 'База'])
            ->andWhere (['value' => '400'])->asArray ()->all (); }
        if($group['45'] == true){$type45 =Property::find ()->with ('products')->where   (['name' => 'База'])
            ->andWhere (['value' => '450'])->asArray ()->all (); }
        if($group['50'] == true){$type50 =Property::find ()->with ('products')->where   (['name' => 'База'])
            ->andWhere (['value' => '500'])->asArray ()->all (); }
        if($group['60'] == true){$type60 =Property::find ()->with ('products')->where   (['name' => 'База'])
            ->andWhere (['value' => '600'])->asArray ()->all (); }
        if($group['70'] == true){$type70 =Property::find ()->with ('products')->where   (['name' => 'База'])
            ->andWhere (['value' => '700'])->asArray ()->all (); }
        if($group['80'] == true){$type80 =Property::find ()->with ('products')->where   (['name' => 'База'])
            ->andWhere (['value' => '800'])->asArray ()->all (); }

        $property=array_merge ($type40,$type45);
        $property=array_merge ($property,$type50);
        $property=array_merge ($property,$type60);
        $property=array_merge ($property,$type70);
        $property=array_merge ($property,$type80);
        $property2 = [];

        foreach ($property as $items){
            $property2 = array_merge ($property2,Products::find ()
                ->with ('property')
                ->where (['name'=>$items['products']['name'] ])
                ->asArray()
                ->all ());}
        return $property2;
    }

    public function actionSort(){

        $chFlag= 0;
        $id_group = trim (Yii::$app->request->get ('id_group'));

        $categories = Categories::findOne($id_group);

        $type1=$type2=$type3=$type4=$type5=$type6=$type7=$type8=$type40=$type45=$type50=$type60=$type70=$type80 = [];

        $type['1'] = trim (Yii::$app->request->get ('type1'));
        $type['2'] = trim (Yii::$app->request->get ('type2'));
        $type['3'] = trim (Yii::$app->request->get ('type3'));
        $type['4'] = trim (Yii::$app->request->get ('type4'));
        $type['5'] = trim (Yii::$app->request->get ('type5'));
        $type['6'] = trim (Yii::$app->request->get ('type6'));
        $type['7'] = trim (Yii::$app->request->get ('type7'));
        $type['8'] = trim (Yii::$app->request->get ('type8'));
        $type['40'] = trim (Yii::$app->request->get ('type40'));
        $type['45'] = trim (Yii::$app->request->get ('type45'));
        $type['50'] = trim (Yii::$app->request->get ('type50'));
        $type['60'] = trim (Yii::$app->request->get ('type60'));
        $type['70'] = trim (Yii::$app->request->get ('type70'));
        $type['80'] = trim (Yii::$app->request->get ('type80'));

        foreach ($type as $value) {
            if ($value == true) {$chFlag = 1;}
        }


        if($chFlag == 1){

            if(isset($_GET['type40']) or isset($_GET['type45']) or isset($_GET['type50'])
                or isset($_GET['type60']) or isset($_GET['type70']) or isset($_GET['type80'])){
                $products = $this->SortGroup2($type);$gr=2;
            }
            else{
                $products = $this->SortGroup1($type);$gr=1;
            }


            return $this->render ( 'sort' , compact ( 'products' ,'type','categories','gr') );
        }
        else {
            return $this->redirect ( $_SERVER['HTTP_REFERER'] );
        }

    }



    public function actionFilter(){

        $session =Yii::$app->session;
        $session->open();


        return $this->render ( 'filter' , compact ( 'session') );

    }
    public function actionSearch()
    {
        $q = trim (Yii::$app->request->get ('q'));
        if(!$q)
            return $this->render('search');
        $query = Products::find()->where(['like','name',$q])->andWhere(['status' => 1]);
        $pages = new Pagination(['totalCount' => $query->count (),'pageSize' => 6]);

        $products = $query->offset ($pages->offset)->limit ($pages->limit)->asArray()->all();

        return $this->render('search', compact('products','pages','q'));
    }


    //карточка товара
    public function actionProduct()
    {
        $comments = new Comments();

        if($comments->load (Yii::$app->request->post ())) {
            $comments->product_id = $_GET['id'];
            $comments->comment_date = date("d.m.y - [G:i]");


            if ($comments->save()){
                Yii::$app->session->setFlash('success','Данные приняты');

                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка');
            }
        }



        if (isset($_GET['id']) && $_GET['id'] != "")
        {
            $product = Products::find()->with (['image_products','category','property'])->where(['id' => $_GET['id']])->one();


            if(empty($product)){throw  new yii\web\HttpException(404,'Такой товар не существует.');}
            $image_big = Images_products::find()->where(['id_prod' => $_GET['id']])->andWhere (['>=','avalible',1])->asArray()->one();

            $this->setMeta ('Таурус маркет | каталог | '.$product['name'],'|'.$product['keywords'],$product['description'] );

            return $this->render('product', compact('product','image_big','comments'));
        }
        else{return $this->redirect(['page/catalog']);}
    }


    //каталог
    public function actionCatalog()
    {
        $categories = Categories::find()->asArray()->all();
        $this->setMeta ('Таурус маркет | каталог');
        return $this->render('catalog',compact('categories'));
    }

    //корзина
    public function actionCart()
    {
        $this->setMeta ('Таурус маркет | корзина');

        return $this->render('cart');
    }

    //новости
    public function actionNews()
    {
        $news = News::find()->where (['status'=> 1])->asArray()->all();

        $this->setMeta ('Таурус маркет | новости');
        return $this->render('news',compact('news'));
    }

    //о нас
    public function actionAbout()
    {
        $this->setMeta ('Таурус маркет | о нас');
        return $this->render('about');
    }

    //контакты
    public function actionContacts()
    {
        $this->setMeta ('Таурус маркет | контакты');
        return $this->render('contacts');
    }

    //доставка
    public function actionShipment()
    {
        $this->setMeta ('Таурус маркет | доставка');
        return $this->render('shipment');
    }

    //оплата
    public function actionPm()
    {
        $this->setMeta ('Таурус маркет | оплата');
        return $this->render('payment');
    }

    //скидки
    public function actionDiscount()
    {
        $this->setMeta ('Таурус маркет | скидки');
        return $this->render('discount');
    }

    //карта сайта
    public function actionSite_map()
    {
        $this->setMeta ('Таурус маркет | карта сайта');
        return $this->render('site_map');
    }

    //обратная связь
    public function actionFeedback()
    {

        $feed_list=Feeback::find()->where (['status'=> 1 ])->asArray()->all();
        
        $feed = new FeedbackForm();

        if($feed->load(Yii::$app->request->post())){

            if ($feed->save()){
                Yii::$app->session->setFlash('success','Данные приняты');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка');
            }
        }

        $this->setMeta ('Таурус маркет | обратная связь');
            return $this->render ( 'feedback', compact('feed_list','feed'));
    }

    //заказать звонок
    public function actionCallback()
    {
        $model = new CallForm();
//        $this->layout = false;

        if($model->load(Yii::$app->request->post())){

            if ($model->save()){
                Yii::$app->session->setFlash('success','Данные приняты');

                $callback=Callback::find()->asArray()->all();

                debug ( $callback);
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка');
            }
        }

        $this->setMeta ('Таурус маркет | заказать звонок');
        return $this->render('callback',compact('model'));

    }

    public function actionMail(){
        //сообщение админу

        $name = Yii::$app->request->get('name');
        $phone = Yii::$app->request->get('phone');

        $admin_email= Yii::$app->params['adminEmail'];
        Yii::$app->mailer->compose ('callback', ['name' => $name,'phone'=>$phone])
            ->setFrom ([$admin_email=>'Taurus-market'])
            ->setTo ($admin_email)
            ->setSubject ('Заказан обратный звонок')
            ->send ();
    }

//    public function actionTest()
//    {
//        $this->layout='test';
//
//        return $this->render('test');
//    }

    public function actionAddmail(){
        $fl=1;
        $email = Yii::$app->request->get('em');
        $newsletter = Newsletter::find ()->asArray ()->all ();

        foreach ($newsletter as $item){
            if ($item['email'] != $email){$fl=1;}
            else {$fl = 0;}
        }

        if ($fl ==1 ){
            $newsletter_s = new Newsletter();
            $newsletter_s->email = $email;
            $newsletter_s->save ();}
    }




}

