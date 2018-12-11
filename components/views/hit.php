<?php
//\app\controllers\debug ($content);
use yii\helpers\Url;
use yii\helpers\Html;
?>


<?php foreach ($content as $cnt):?>
    <?php $link_prod = Url::toRoute(['page/product','id' => $cnt->products->id]); ?>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="product">
        <a href="<?=$link_prod?>" class="product_img">
            <?=Html::img(Yii::$app->params['imgAddr'].$cnt['img'])?>
        </a>
        <a href="<?=$link_prod?>" class="product_title"><?php echo $cnt->products->name; ?></a>
        <?=$cnt['name']?>

        <div class="product_price">
            <span class="price"><?=$cnt['price']?><i class="glyphicon glyphicon-rub"></i></span>
        </div>



        <div class="product_btn">
            <a href="<?=Url::to (['cart/add','id'=> $cnt->id])?>" data-id ="<?= $cnt->id?>"
               class="cart add_cart_prod"><i class="glyphicon glyphicon-shopping-cart"></i></a>


            <a href="#" class="mylist add_mylist_prod" data-id ="<?= $cnt->id?>">Список желаний</a>
        </div>
    </div>
</div>
<?php endforeach;?>