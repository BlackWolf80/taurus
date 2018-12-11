<?php
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

        <form method="get" action="<?=Url::to(['/page/sort'])?>">
            <hr width="100%"><label>По типу</label>
            <div class="filter_check">
                <input name="id_group" value="<?=$categories['id'] ?>" hidden="true"/>
                <p><input type="checkbox" name="type1"/>Круглые</p>
                <p><input type="checkbox" name="type2"/>Прямоугольные</p>
                <p><input type="checkbox" name="type3"/>Квадратные</p>
                <p><input type="checkbox" name="type4"/>Овальные</p>
                <p><input type="checkbox" name="type5"/>Угловые</p>
                <p><input type="checkbox" name="type6"/>С крылом</p>
                <p><input type="checkbox" name="type7"/>Реверсивные</p>
                <p><input type="checkbox" name="type8"/>С двумя чашами</p>
            </div>

            <hr width="100%"><label>По размеру</label>
            <div class="filter_check">
                <p><input type="checkbox" name="type40"/>В тумбу 40см</p>
                <p><input type="checkbox" name="type45"/>В тумбу 45см</p>
                <p><input type="checkbox" name="type50"/>В тумбу 50см</p>
                <p><input type="checkbox" name="type60"/>В тумбу 60см</p>
                <p><input type="checkbox" name="type70"/>В тумбу 70см</p>
                <p><input type="checkbox" name="type80"/>В тумбу 80см</p>
            </div>

            <hr width="100%"><?=Html::submitButton('Подобрать', ['class'=> ''])?>
        </form>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="short_description">
            <?=Html::img($categories['img'])?>
            <div>
                <h2><?php echo $categories['name']; ?></h2>
                <p> <?php echo $categories['description']; ?></p>
            </div>
        </div>



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                        <?php echo LinkPager::widget(['pagination' => $pages ]);?>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod_l">
                        <p><strong>Вид:</strong>
                            <a href="<?=Url::toRoute(['page/listproducts','id' => $_GET['id']]);?>">
                                <i class="glyphicon glyphicon-th"></i><span>Сетка</span></a>
                            <a href="<?= Url::toRoute(['page/listproducts','id' => $_GET['id'],'vid'=>1]); ?>">
                                <i class="glyphicon glyphicon-th-list"></i><span>Список</span></a>
                        </p>
                    </div>
                </div>
            </div>

            <?php if(!empty($products)): ?>


            <?php $i=0; foreach ($products as $product): ?>
            <?php $link_prod = Url::toRoute(['page/product','id' => $product['id']]); ?>
                    <table class="listproducts_l">


                        <?php foreach ($products as $product): ?>

                            <?php $link_prod = Url::toRoute(['page/product','id' => $product['id']]); ?>

                                <td class="image_prod">
                                    <a href="<?php echo $link_prod; ?>">
                                        <img src="<?php echo $product['img']; ?>"></a>
                                </td>

                                <td class="name_prod">
                                    <a href="<?php echo $link_prod; ?>">
                                        <?php echo $product['name']; ?></a>
                                </td>
                            </tr>
                        <?php  endforeach;?>
                    </table>

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
    </div>
