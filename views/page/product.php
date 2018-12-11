<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Products;
use app\components\HitWidget;
use yii\captcha\Captcha;
?>
<?php
$categories=$product->category;
$images=$product->image_products;
//foreach ($images as $image)
//{
//   echo $image->img.'<br>';
//}

//\app\controllers\debug ($images);

?>


<div class="container">

    <div class="row">
        <div class="col-lg-12 contant_wrap">
            <div class="navigation">
                <ul>
                    <li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="<?=Url::toRoute('page/catalog');?>">Каталог</a></li>
                    <li><a href="<?=Url::toRoute(['page/listproducts','id' => $categories->id]);?>"><?php echo $categories->name;?></a></li>
                    <li><span><?php echo $product['name']; ?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row content page_prod">
                <!--    -->
                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">

                    <div class="bigtext ">
                        <span>
                            <input type="text" id="result" name="result"  value="<?php echo $image_big['name']; ?>" disabled/>
                        </span>




                        <div class="img_prod">
                            <!-- крупное изображение -->
                            <div class="img_slide">

                                <a href="<?php echo Yii::$app->params['imgAddr'].$image_big['img']; ?>"  id="bigimage" class='fresco' data-fresco-group='example'>
                                    <img src="<?php echo Yii::$app->params['imgAddr'].$image_big['img']; ?>" id="bigimageimg" alt="" />
                                </a>
                            </div>
                        </div>

                        <!-- характеристики-->
                        <div class="h_prod">
                            <h3>Характеристики:</h3>
                            <table class="table table-striped table-bordered">
                                <?php
                                $propert=$product->property;
                                foreach ($propert as $pr){
                                    if($pr->unit != null){$comma=', ';}else{$comma= '';}
                                    echo '<tr><td>'.$pr->name.$comma.$pr->unit.'</td><td>'.$pr->value.'</td></tr>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <!--комментарии-->
                    <div class="reviews">
                        <h4>Отзывы о товаре:</h4>
                        <?php $commnet=$product->comments; ?>
                        <?php foreach ($commnet as $com): ?>
                            <div class="reviews_img">
                                <img src="images/avatar.png">
                            </div>
                            <!-- вывод комментариев -->
                            <div class="reviews_contant">
                                <p class="reviews_title"> <?=$com->user_name;?> <span> <?=$com->comment_date;?></span></p>
                                <p class="reviews_text"> <?=$com->comment_text;?></p>
                                <div class="reviews_rating"></div>
                            </div>
                        <?php endforeach;?>


                        <!-- /вывод комментариев -->
                    </div>

                    <div class="reviews_form">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Добавить отзыв</p>
                        </div>



                        <?php $form = ActiveForm::begin(['options'=>['id' => 'orderForm']]) ?>
                        <div class="col-lg-12"><?=$form->field($comments,'user_name') ?></div>
                        <div class="col-lg-12"><?=$form->field($comments,'email') ?></div>
                            <div class="col-lg-12"><?=$form->field($comments,'comment_text')->textarea () ?></div>
                        <?= $form->field($comments, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-6">{input}</div></div>',]) ?>
                        <div class="capcha_des"> (чтобы обновить код кликните по нему мышью.)</div>
                        <?=Html::submitButton('Отправить', ['class'=> 'add_call1'])?>

                        <?php ActiveForm::end() ?>


                    </div>
                    <!-- /комментарии -->
                </div>


                <div class="col-lg-5 col-md-8 col-sm-7 col-xs-12">
                    <div class="content_prod">
                        <h1><span><?php echo $product['name']; ?></span></h1>
                        <p><span>Артикул:</span> <?php echo $product['id']; ?></p>
                        <p><span><?php echo $product['description']; ?></span></p>


                        <form>
                            <div class="row">
                                <div class="col-lg-12 "><div class="thumbs">
                                        <?php $i=0; foreach ($images as $img): ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 pr_block">
                                        <?php if( $img['status']!=0 ) :?>

                                            <div class="image_prod listproducts_P">
                                                        <div class="thumb">
                                                            <a href="<?php echo Yii::$app->params['imgAddr'].$img['img'];?>" class='sliderpr fresco' data-fresco-group='example'>
                                                                <img src="<?php echo Yii::$app->params['imgAddr'].$img['img']; ?>" alt=""
                                                                     discount="<?php echo $img['discount']; ?>"
                                                                     price="<?php echo $img['price']; ?>"
                                                                     title="<?php echo $img['name']; ?>"
                                                                     id="<?php echo $img['id']; ?>"/>
                                                                <div class="overlayit"></div>
                                                            </a>
                                                        </div>
                                                <div class="add_wich"> <a href="<?=Url::to (['/wish/add','id'=> $img['id']])?>" data-id ="<?= $img['id']?>"
                                                                          class="add_mylist_prod" ><i class="glyphicon glyphicon-heart"></i></a></div>
                                            </div>

                                                <div class="name_pr"> <?php echo $img['name']; ?></div>

                                            <div class="name_pr"> <?php echo $img['price']; ?><span class="glyphicon glyphicon-rub"></span></div>


                                             <div>  <?php if ($img['avalible']<=0){echo '<div class="alert alert-warning">под заказ</div>';}
                                                 else{echo '<div class="alert alert-info"> в наличии</div>';} ?> </div>

                                                    <div>
                                                    <a href="<?=Url::to (['cart/add','id'=> $img['id']])?>"data-id ="<?= $img['id']?>"
                                                           class="add_cart_prod"> <i class="glyphicon glyphicon-shopping-cart"></i></a></div>

                                                <?php endif; ?>

                                    </div>
                                            <?php $i++;?> <!-- построчный вывод -->
                                            <?php if($i % 3 == 0): ?>
                                                <div class="clearfix"></div>
                                            <?php endif; ?>
                                    <?php  endforeach;?>






                                    </div></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-md-8 col-sm-7 col-sm-offset--5 col-xs-12">
                    <div class="order_prod">

                        <!-- индикатор процентов скидки-->
                        <span>
                                 <?php
                                 $var = Html::input('text', 'discount', $image_big['discount'],['id' => 'discount', 'disabled' => 'disabled', 'size'=>'1',]);
                                 print '<div class="order_prod_2">'; echo '- ', $var, ' %'; print '</div>';
                                 ?>
                           </span>

                        Стоимость:
                        <p class="price_prod">
                            <input type="text" id="price" name="price"  value="<?php echo $image_big['price']; ?>" disabled/>
                            <span class="glyphicon glyphicon-rub"></span>

                        <p>Количество:</p>
                        <form>
                            <input id="qty2" type="text" name="" value="1" class="input_text">
                        </form>
                        <a href="#" data-id="<?=$id= $img['id']-11;?>" class="add-to-cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>
                        <p><div class="input_hiden"> <input id="cart2" type="text" name="" value="1" class="input_text" disabled></div></p>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
</div>

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





