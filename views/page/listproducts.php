<?php
use app\components\SortWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
        <div class="row">
		    <div class="col-lg-12 contant_wrap">
		    	<div class="navigation">
		    		<ul>
		    			<li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
		    			<li><a href="<?=Url::toRoute('page/catalog');?>">Каталог</a></li>
  		    			<li><span><?php echo $categories['name']; ?></span></li>
		    		</ul>
		    	</div>
		    </div>
    	</div>


    	<div class="row">
    		<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
    			<h3>Фильтры</h3>


                <?=SortWidget::widget (['category' => $categories['id']])?>
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
                        <div class="row"><div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"></div></div></div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                                <?php echo LinkPager::widget(['pagination' => $pages ]);?>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod">
                            <!--    <p><strong>Вид:</strong>
                                    <a href="<?=Url::toRoute(['page/listproducts','id' => $_GET['id']]);?>">
                                        <i class="glyphicon glyphicon-th"></i><span>Сетка</span></a>
                                    <a href="<?= Url::toRoute(['page/listproducts','id' => $_GET['id'],'vid'=>'list']); ?>">
                                        <i class="glyphicon glyphicon-th-list"></i><span>Список</span></a>
                                </p> -->
                            </div>
                        </div>
                    </div>

                    <?php if(!empty($products)): ?>
                        <?php $i=0; foreach ($products as $product): ?>
                            <?php $link_prod = Url::toRoute(['page/product','id' => $product['id']]); ?>
                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                        <div class="product">
                            <a href="<?php echo $link_prod; ?>"
                            <div class="product_img"><span></span>
                                 <?=Html::img(Yii::$app->params['imgAddr'].$product['img'])?></a>
                                <div class="product_btn">
                                    <a href="<?php echo $link_prod; ?>" class="btn1">
                                      <?php echo $product['name']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                            <?php $i++;?> <!-- построчный вывод -->
                            <?php if($i % 3 == 0): ?>
                            <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php  endforeach;?>
                        <div class="clearfix"></div>
                        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                            <div class="product">
                                <?php echo LinkPager::widget(['pagination' => $pages ]);?>
                            </div>
                        </div>
                        <?php else: ?>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                                <div class="rows">
                                    <div class="product_empty"><h2>Тут товаров пока нет.</h2></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
