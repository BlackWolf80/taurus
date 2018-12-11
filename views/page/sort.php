<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\components\SortWidget;
?>


<div class="row">
   <div class="col-lg-12 contant_wrap">
      <div class="navigation">
         <ul>
            <li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
            <li><a href="<?=Url::toRoute('page/catalog');?>">Каталог</a></li>
            <li><a href="<?=Url::toRoute(['page/listproducts','id' => $categories['id']]);?>">
                    <?php echo $categories['name']; ?></a></li>
             <li><span><?php echo 'Фильтр'; ?></span></li>
         </ul>
      </div>
   </div>
</div>



<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
        <h3>Фильтры</h3>


        <?=SortWidget::widget (['category' => $categories['id']])?>
        <div class="container"> <a href="<?=Url::toRoute(['page/listproducts','id' => $categories['id']]);?>">
                <?=Html::Button('Очистить выбор', ['class'=> ''])?></a>
        </div>


    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="short_description">
            <?=Html::img($categories['img'])?>
            <div>
                <h2><?php echo $categories['name']; ?></h2>
                <p> <?php echo $categories['description']; ?></p>
            </div>
        </div>

        <div class="row content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
                <div class="row">
                    <?php $i=0;//флаг для построчного переноса
                    foreach ($products as $product){
                        $link_prod = Url::toRoute(['page/product','id' => $product['id']]);
                        echo '<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">';
                        echo '<div class="product">';
                        echo '<a href="'. $link_prod.'" target=_blank';
                        echo '<div class="product_img"><span></span>'.Html::img($product['img']).'</a>';
                        echo '<div class="product_btn"><a href="'. $link_prod.'" class="btn1" target=_blank>';
                        echo $product['name'].'</a></div></div></div>';
                        $i++; // построчный
                        if($i % 3 == 0){echo '<div class="clearfix"></div>';}
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
