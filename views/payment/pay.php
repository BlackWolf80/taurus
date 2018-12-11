<?php
use yii\helpers\Url;

?>

<div class="container">

    <div class="row">
        <div class="col-lg-12 contant_wrap">
            <div class="navigation">
                <ul>
                    <li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="<?=Url::toRoute('page/catalog');?>">Каталог</a></li>
                    <li><span>Оформление заказа</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if( Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?php echo Yii::$app->session->getFlash('success'); ?>
                </div>
            <?php endif;?>

            <?php if( Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <?php echo Yii::$app->session->getFlash('error'); ?>
                </div>
            <?php endif;?>
        </div>
    </div>

    <div class="container">

<div class="row">

    <div class="col-lg-12">

        <?//=\app\controllers\debug ($order);?>

        <?php



        foreach ($order as $ord){
            foreach ($ord->order_products as $items){
                //echo $items['prod'].' '.$items['name'];
            }
        }


        if ($ord->card_id != null ){$cardDiscount=($ord->sum*10)/100;
        }else{$cardDiscount=0;}

        if ($ord->discount != null ){$discount=($ord->sum*$ord->discount)/100;
        }else{$discount=0;}

        ?>




        <h3>Пожалуйста выберите способ оплаты.</h3><br></div></div>
    </div>
<div class="container">
    <div class="row">
        <div class="contant_wrap">
            <div class="col-lg-12">

    <table>
        <tr>
            <td>

                <div>
                    <img src="/images/payments.png" width="250"><br>

                    <?php
                    if (Yii::$app->params['testRegim']==0){
                        $mrh_pass1 = Yii::$app->params['pass1'];
                    }
                    elseif (Yii::$app->params['testRegim']==1){
                        $mrh_pass1 = Yii::$app->params['pass1_t'];
                        $IsTest = 1;
                    }

                    if (Yii::$app->params['testRegim']==1) {
                        $testInput = '<input type=hidden name=IsTest value='.$IsTest.'>';
                    }
                    else{$testInput = '';}

                    // 1.
                    // Оплата заданной суммы с выбором валюты на сайте мерчанта
                    // Payment of the set sum with a choice of currency on merchant site

                    // регистрационная информация (логин, пароль #1)
                    // registration info (login, password #1)
                    $mrh_login = "market.firma-taurus.ru";
                    //$mrh_pass1 = "V28Qk3CAom3FWzW5dbXV";

                    // номер заказа
                    // number of order
                    $inv_id = $id;
                    $desc='Заказ №'.$id;
                    // описание заказа
                    // order description
                    $inv_desc = $desc;

                    // сумма заказа
                    // sum of order
                    $out_summ = $ord->sum-$cardDiscount;

                    //echo $out_summ;
                    // тип товара
                    // code of goods
                    $shp_item = "2";

                    // предлагаемая валюта платежа
                    // default payment e-currency
                    $in_curr = "";

                    // язык
                    // language
                    $culture = "ru";

                    // формирование подписи
                    // generate signature
                    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");


                    $encoding = "utf-8";

                    $IsTest = 1;

                    // форма оплаты товара
                    // payment form
                    print "<html>".
                        "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
                        "<input type=hidden name=MrchLogin value=$mrh_login>".
                        "<input type=hidden name=OutSum value=$out_summ>".
                        "<input type=hidden name=InvId value=$inv_id>".
                        "<input type=hidden name=Desc value='$inv_desc'>".
                        "<input type=hidden name=SignatureValue value=$crc>".
                        "<input type=hidden name=Shp_item value='$shp_item'>".
                        "$testInput".
                        "<input type=hidden name=IncCurrLabel value=$in_curr>".
                        "<input type=hidden name=Culture value=$culture>".
                        "<input type=submit  value='Безналичный расчет' class=\"payment-order\">".
//                        '<br> (временно не работает)'.
                        "</form></html>";

                    ?>


                </div>

            </td>
            <td>
                <div>
                    <img src="/images/nal.png" width="250"><br>
                    <a href="/payment/res?den=1&id=<?=$id?>" class="payment-order">Оплата наличными</a>
                </div>
            </td>

        </tr>

        <tr>
            <td><br><br><br><img src="/images/CANCELLED.jpg" width="100">
                <a href="/payment/res?den=0&id=<?=$id?>" class="payment-order">Отказаться от заказа</a></td>
        </tr>

    </table>
            </div></div></div>


</div>
</div>

