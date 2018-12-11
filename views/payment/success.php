﻿<?
use app\components\HitWidget;

// регистрационная информация (пароль #1)
// registration info (password #1)
//$mrh_pass1 = "password_1";

if (Yii::$app->params['testRegim']==0){
    $mrh_pass1 = Yii::$app->params['pass1'];
}
elseif (Yii::$app->params['testRegim']==1){
    $mrh_pass1 = Yii::$app->params['pass1_t'];
    $IsTest = 1;
}


// чтение параметров
// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$shp_item = $_REQUEST["Shp_item"];
$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

// проверка корректности подписи
// check signature
if ($my_crc != $crc)
{
    echo "bad sign\n";
    exit();
}

// проверка наличия номера счета в истории операций
// check of number of the order info in history of operations
$f=@fopen("order.txt","r+") or die("error");

while(!feof($f))
{
    $str=fgets($f);

    $str_exp = explode(";", $str);
    if ($str_exp[0]=="order_num :$inv_id")
    {
        echo '<br /><br /><br />';

        Yii::$app->db->createCommand ( "UPDATE orders SET debit = 1   WHERE id=  $inv_id" )->execute ();
        echo "<h4>Операция прошла успешно.</h4><br /> Вы можете продолжить покупки.";


    }
}
fclose($f);
?>
<div class="container-fluid tabs_block_main">
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Новинки</a></li>
                <li><a href="#tab2" data-toggle="tab">Хиты</a></li>
                <li><a href="#tab3" data-toggle="tab">Акции</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <?=HitWidget::widget (['var_view' => 'new']);?>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <?=HitWidget::widget (['var_view' => 'hit']);?>
                </div>
                <div class="tab-pane fade" id="tab3">
                    <?=HitWidget::widget (['var_view' => 'sales']);?>
                </div>
            </div>
        </div>
    </div>
</div>

