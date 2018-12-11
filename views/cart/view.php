<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\models\OrderProducts;
?>

<?php $form = ActiveForm::begin(['options'=>["class" => "form-horizontal",'id' => 'orderForm']]) ?>
<div class="container">
        <div class="row">
            <div class="contant_wrap">
                <div class="col-lg-12">
                    <div class="navigation">
                        <ul>
                            <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>
                            <li><span>Корзина</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php if( Yii::$app->session->hasFlash('success') ): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <?php echo Yii::$app->session->getFlash('success'); ?>
                    </div>
                <?php endif;?>

                <?php if( Yii::$app->session->hasFlash('error') ): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <?php echo Yii::$app->session->getFlash('error'); ?>
                    </div>
                <?php endif;?>
            </div>
        </div>

        <span class="row cart_wrap">
            <div class="col-lg-12 top_cart_block">
                <div>
                    <p>корзина</p>
                    <p>Ваша корзина содержит:<b> <?= $session['cart.qty']?></b> товар(ов), на сумму:<b> <?= $session['cart.sum']?></b>
                        <span class="glyphicon glyphicon-rub"></span></p>
                </div>
            </div>


            <?php if(!empty($session['cart'])): ?>
        <div class="col-lg-12"><ul class="cart_status"><li class="active"><span>1. Заказ</span></li></ul></div>
        <div class="col-lg-12">

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Фото</th>
                            <th>Наименование</th>
                            <th>Цвет</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th colspan="2">Cумма</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($session['cart'] as $id => $item):?>
                            <tr>
                                <td><img src=" <?= Yii::$app->params['imgAddr'].$item['img']?>" class="small_img"> </td>
                                <td><?=Html::a ($item['prod'],Url::to (['/page/product','id'=> $item['prod_id']]));?> </td>
                                <td><?= $item['name']?></td>
                                <td><?= $item['qty']?> шт.</td>
                                <td><?= $item['price']?><span class="glyphicon glyphicon-rub"></span></td>
                                <td colspan="2"><?= $item['qty']*$item['price']?><span class="glyphicon glyphicon-rub"></span></td>
                            </tr>
                            <?php endforeach?>

                            <tr>
                                <td colspan="3"><b>ИТОГО:</b> </td>
                                <td colspan="2" l><b><?= $session['cart.qty']?> шт.</b></td>
                                <td><b><span class="itog_input">
                                            <?= $session['cart.sum']?>
                                        </span><span class="glyphicon glyphicon-rub"></span></b></td>
<!--                                <input id="itog_input" value=" --><?//= $session['cart.sum']?><!--" disabled hidden>-->
                                <td></td>
                                </tr>
                        </tbody>
                    </table>
                </div>


                    <?php if (!Yii::$app->user->isGuest) :?>

                <table>
                    <tr>
                        <td>Бонусных баллов:<b><?=Html::input('text', 'points_int', $card['points'],
                                    ['id' => 'points_int', 'disabled' => 'disabled', 'size'=>'6',]);?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><?=$form->field($order,'points')->input('text') ?></td>
                        <td>
                            <a href="#" class="ordrec"  data-itog = "<?= $session['cart.sum']?>"><span>Пересчитать итоговую сумму</span></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><h4>Итого к оплате:
                                <?=Html::input('text', 'discount', $session['cart.sum'],
                                    ['id' => 'itog_output', 'disabled' => 'disabled', 'size'=>'6',]);?>
                                <i class="glyphicon glyphicon-rub"></i></h4>
                        </td>
                    </tr>
                </table>
                    <?php elseif (Yii::$app->user->isGuest): ?>
                        <div class="col-lg-4 card_in">

                        <?php
                        $i=0;
                        foreach ($cards as $card){$cards_js[$i]=$card['username']; $i++;}
                        $data= json_encode($cards_js); $itog_in=json_encode($session['cart.sum']);
                        ?>
                        <script>var data=<?php echo $data?>; var itog_in=<?php echo $itog_in?></script>


                             <?php echo$form->field($order,'card_id')->textInput (['onchange'=>"showExchange()"]);?>
                        </div>
                        <div class="col-lg-3 col-md-offset-3 itog">
                                <h4>Итого к оплате:
                                    <div id="itog_output_old">
                                        <?=$session['cart.sum'];?>
                                        <i class="glyphicon glyphicon-rub"></i>
                                    </div>
                                    <?=Html::input('text', 'discount', $session['cart.sum'],
                                        ['id' => 'itog_output2', 'disabled' => 'disabled', 'size'=>'6',]);?>
                                    <i class="glyphicon glyphicon-rub"></i>
                                </h4>
                            </div>



                    <?php endif; ?>
        </div>
    <div class="col-lg-12"><ul class="cart_status"><li class="active"><span>2. Контактные данные </span></li></ul></div>
    <div class="container">
        <div class="row">
           <?php if (!Yii::$app->user->isGuest) :?>
            <table class="address_form">
                <tr>
                    <td><?=$form->field($order,'name')->input('text',['value'=>$card['name']]) ?>
                                                        <?=$form->field($order,'phone')->input('text',['value'=>$card['phone']]) ?>
                    </td>
                    <td>
                        <?=$form->field($order,'last_name')->input('text',['value'=>$card['last_name']]) ?>
                        <?=$form->field($order,'email')->input('text',['value'=>$card['email']]) ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
<div class="demo">
                <input type="checkbox" id="hd-1" class="hide"/>
                <label for="hd-1" class="add-order" >Доставка ></label>
                <div>
                <?=$form->field($order,'address')->input('text',['value'=>$card['address']]) ?>
                </div>
                <br/>
                <br/>
            </div>
                    </td>
                </tr>
            </table>

            <?php elseif(Yii::$app->user->isGuest):?>
               <table class="address_form">
                <tr>
                    <td><?=$form->field($order,'name')->input('text') ?>
                        <?=$form->field($order,'phone')->input('text') ?>
                    </td>
                    <td>
                        <?=$form->field($order,'last_name')->input('text') ?>
                        <?=$form->field($order,'email')->input('text') ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
<div class="demo">
                <input type="checkbox" id="hd-1" class="hide"/>
                <label for="hd-1" class="add-order" >Доставка ></label>
                <div>
                <?=$form->field($order,'address')->input('text') ?>
                </div>
                <br/>
                <br/>
            </div>
                    </td>
                </tr>
            </table>

           <?php endif;?>


        </div>
    </div>
    <div class="col-lg-12"><ul class="cart_status"><li class="active"><span>3. Подтверждение </span></li></ul></div>
    <?php if(!Yii::$app->user->isGuest){$form->field($order,'status')->input('text');} ?>
    <?= $form->field($order, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-2">{input}</div></div>',]) ?>
            <div class="capcha_des"> (чтобы обновить код кликните по нему мышью.)</div>
            <?= Html::submitButton ('Оформить заказ',['class' => 'add-order','id'=>'add-order']) ?>
            <?php else: ?>
                <h3>Корзина пуста</h3>
            <?php endif;?>
</div>
</div>
<?php ActiveForm::end() ?>
