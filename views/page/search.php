<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?><?php if(!empty($products)): ?>
<div class="row">
    <div class="col-lg-12 contant_wrap">
        <div class="navigation">
            <ul>
                <li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="<?=Url::toRoute('page/catalog');?>">Каталог</a></li>
                <li><span><?php echo 'Ваш запрос: <b>'. Html::encode ($q),'</b>'; ?></span></li>
            </ul>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
        <h3>Фильтры</h3>
        <form>
            <label>Цена / руб</label>
            <div class="filter_price">
                <input type="text" value="0">
                -
                <input type="text" value="10000">
            </div>
            <hr width="100%">
            <label>По типу</label>
            <div class="filter_check">
                <p><input type="checkbox"/>Круглые</p>
                <p><input type="checkbox"/>Прямоугольные</p>
                <p><input type="checkbox"/>Квадратные</p>
                <p><input type="checkbox"/>Овальные</p>
                <p><input type="checkbox"/>Угловые</p>
                <p><input type="checkbox"/>С крылом</p>
                <p><input type="checkbox"/>Реверсивные</p>
                <p><input type="checkbox"/>С двумя чашами</p>
            </div>
            <hr width="100%">
            <label>По размеру</label>
            <div class="filter_check">
                <p><input type="checkbox"/>В тумбу 40см</p>
                <p><input type="checkbox"/>В тумбу 45см</p>
                <p><input type="checkbox"/>В тумбу 50см</p>
                <p><input type="checkbox"/>В тумбу 60см</p>
                <p><input type="checkbox"/>В тумбу 70см</p>
                <p><input type="checkbox"/>В тумбу 80см</p>
            </div>
            <hr width="100%">
            <button type="submit">Подобрать</button>
        </form>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="short_description">


        </div>
        <div class="row content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h1><?php echo 'Поиск по запросу:<u> '.Html::encode ($q).'</u>'; ?></h1>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                        <form action="#">
                            <p><strong>Сортировка по:</strong>
                                <select name="sortirovka_prod">
                                    <option selected="selected">--</option>
                                    <option value="0">Цене, по возрастанию</option>
                                    <option value="1">Цене, по убыванию</option>
                                    <option value="2">Названию товара, от А до Я</option>
                                    <option value="3">Названию товара, от Я до А</option>
                                </select>
                            </p>
                            <p><strong>Показать:</strong>
                                <select name="number_prod_str">
                                    <option selected="selected">12</option>
                                    <option value="0">24</option>
                                    <option value="1">48</option>
                                </select>
                            </p>
                            <button type="submit">Показать</button>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod">
                        <p><strong>Вид:</strong>
                            <a href="<?=Url::toRoute(['page/listproducts']);?>">
                                <i class="glyphicon glyphicon-th"></i><span>Сетка</span></a>
                            <a href="<?=Url::toRoute(['page/listproducts_list']);?>">
                                <i class="glyphicon glyphicon-th-list"></i><span>Список</span></a>
                        </p>
                    </div>
                </div>
            </div>


            <?php $i=0; foreach ($products as $product): ?>
            <?php $link_prod = Url::toRoute(['page/product','id' => $product['id']]); ?>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                <div class="product">
                    <a href="<?php echo $link_prod; ?>"
                    <div class="product_img">
                        <span></span>
                        <?=Html::img($product['img'])?></a>
                        <a href="<?php echo $link_prod; ?>"
                           class="product_title"><?php echo $product['name']; ?></a>
                        <div class="product_btn">
                            <a href="./cart.html" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                            <a href="#" class="mylist">Список желаний</a>
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
                    </div></div>
                <?php else: ?>
                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                        <div class="rows">
                            <div class="product_empty">
                                <h2> Ничего не найдено...</h2>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
