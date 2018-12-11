<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-lg-12 contant_wrap">
        <div class="navigation">
            <ul>
                <li><a href="<?=Url::toRoute('/');?>"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><span>Личный кабинет</span></li>
                <li>
                    <?php if(!Yii::$app->user->isGuest) :?>
                        <a href="<?=Url::to (['/site/logout'])?>"><i class="glyphicon glyphicon-log-out"></i> Выход</a>
                    <?php endif;?>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="row">
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">

        <?php $form = ActiveForm::begin(['options'=>["class" => "form-horizontal",'id' => 'callForm']]) ?>
        <div class="feedback">
            <?php
            echo '<div class=""> <h3>Карта №  <b>'.$user->username.'</b></h3></div>';
            echo '<div class="block-centr"> Остаток </br>бонусных баллов на счету:
                    </br> <b>'.$user->points.'</b> <i class="glyphicon glyphicon-ruble" aria-hidden="true"></i></div>' ;
            echo '<div class ="" >Владелец:</div>';
            echo '<div class="customer_data"><div class="block">Имя'
                    .Html::input('text', 'discount', $user->name, ['id' => 'name','disabled' => 'disabled', 'size'=>'20',]).'</div>';
            echo '<div class="block">Фамилия'
                .Html::input('text', 'discount', $user->last_name, ['id' => 'last_name','disabled' => 'disabled', 'size'=>'20',]).'</div>';
            echo '<div class="block">Телефон'
                    .Html::input('text', 'discount', $user->phone, ['id' => 'phone','disabled' => 'disabled', 'size'=>'20',]).'</div>';
            //echo '<div class="block">'.Html::submitButton('Обновить', ['class'=> 'add_call']).'</div></div>';
                            echo '<div class ="block-border" >      </div>';
            ?>
        </div>

        <?php ActiveForm::end() ?>


    </div>



    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text">



        </div>
    </div>

</div>


    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text">
            <div class="feedback"> <h2>заказы</h2></div>

            <div class="down_one">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <?php $orders=array_reverse($orders); ?>

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th colspan="3"></th>
                            <th colspan="2">бонусные баллы</th>

                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>дата заказа</th>
                            <th>цена</th>
                            <th>использовано</th>
                            <th>начислено</th>
                            <th>скидка</th>
                            <th>статус</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($orders as $ord):?>
                        <tr>
                            <td>Заказ № <?=$ord['id']; ?></td>
                            <td><?=$ord['created_at']; ?></td>
                            <td><?=$ord['sum']; ?><span class="glyphicon glyphicon-rub"></span></td>
                            <td><?=$ord['points']; ?></td>
                            <td><?= ($ord['sum']*10)/100; ?></td>
                            <td><?php echo ($ord['discount']*100)/$ord['sum']; ?>%</td>
                            <td>
                                <?php
                                if($ord['status'] == 0 or $ord['status'] == 1 )
                                {echo '<span class = "text-warning">'.$ord['order_status']['name'] . '</span>';}
                                elseif ($ord['status'] == 4)
                                {echo '<span class = "text-danger">'.$ord['order_status']['name'] . '</span>';}
                                else{echo '<span class = "text-success">'.$ord['order_status']['name'] . '</span>';}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <div class="panel-group" id="collapse-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#collapse-group" href="#el<?=$ord['id']; ?>">
                                                    <b>Итого к оплате: <?=$ord['sum']-$ord['points']-$ord['discount']; ?></b><span class="glyphicon glyphicon-rub"></span><br> (подробнее)

                                                </a>
                                            </h4>
                                        </div>
                                        <div id="el<?=$ord['id']; ?>" class="panel-collapse collapse">
                                            <div class="panel-body">

                                                <div class="table-responsive">
                                                    <table>
                                                            <tr>
                                                                <td>Заказчик:</td>
                                                                <td><?=$ord['name'].'  '.$ord['last_name']; ?></td>
                                                            </tr>

                                                        <tr>
                                                            <td>Телефон/E-mail:</td>
                                                            <td><?=$ord['phone'].'  /  '?><a href="mailto:<?=$ord['email']?>"><?=$ord['email']; ?></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Адрес:</td>
                                                            <td>
                                                                <a href="https://yandex.ru/maps/?mode=search&text=<?=$ord['address']; ?>" target="_blank">
                                                                    <?=$ord['address']; ?></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Фото</th>
                                                            <th>Наименование</th>
                                                            <th>Кол-во</th>
                                                            <th>Цена</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($ord['order_products'] as $items):?>
                                                            <tr>
                                                                <td><img src="<?= '/'.$items['img']?>" class="small_img"></td>
                                                                <td>
                                                                    <a href="<?=Url::toRoute(['/partner/default/product','id' => $items['id_product']])?>"><?=$items['prod'].'</br>'.$items['name'];?></a>
                                                                </td>
                                                                <td><?=$items['qty']?> шт.</td>
                                                                <td><?=$items['price']?><span class="glyphicon glyphicon-rub"></span></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td></tr>



                    <?php endforeach;?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

