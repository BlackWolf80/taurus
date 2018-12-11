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
                    <?php echo $categories['name']; ?>1</a></li>
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

            <p><input type="checkbox" name="type1"<?php if($type['1'] == 'on'){echo 'checked'; } ?>/>Круглые</p>
            <p><input type="checkbox" name="type2"<?php if($type['2'] == 'on'){echo 'checked'; } ?>/>Прямоугольные</p>
            <p><input type="checkbox" name="type3"<?php if($type['3'] == 'on'){echo 'checked'; } ?>/>Квадратные</p>
            <p><input type="checkbox" name="type4"<?php if($type['4'] == 'on'){echo 'checked'; } ?>/>Овальные</p>
            <p><input type="checkbox" name="type5"<?php if($type['5'] == 'on'){echo 'checked'; } ?>/>Угловые</p>
            <p><input type="checkbox" name="type6"<?php if($type['6'] == 'on'){echo 'checked'; } ?>/>С крылом</p>
            <p><input type="checkbox" name="type7"<?php if($type['7'] == 'on'){echo 'checked'; } ?>/>Реверсивные</p>
            <p><input type="checkbox" name="type8"<?php if($type['8'] == 'on'){echo 'checked'; } ?>/>С двумя чашами</p>
         </div>

         <hr width="100%"><label>По размеру</label>
         <div class="filter_check">
            <p><input type="checkbox" name="type40"<?php if($type['40'] == 'on'){echo 'checked'; } ?>/>В тумбу 40см</p>
            <p><input type="checkbox" name="type45"<?php if($type['45'] == 'on'){echo 'checked'; } ?>/>В тумбу 45см</p>
            <p><input type="checkbox" name="type50"<?php if($type['50'] == 'on'){echo 'checked'; } ?>/>В тумбу 50см</p>
            <p><input type="checkbox" name="type60"<?php if($type['60'] == 'on'){echo 'checked'; } ?>/>В тумбу 60см</p>
            <p><input type="checkbox" name="type70"<?php if($type['70'] == 'on'){echo 'checked'; } ?>/>В тумбу 70см</p>
            <p><input type="checkbox" name="type80"<?php if($type['80'] == 'on'){echo 'checked'; } ?>/>В тумбу 80см</p>
         </div>
          <input name="id_group" value="<?=$categories['id'] ?>" hidden="hidden"/>
         <hr width="100%"><?=Html::submitButton('Подобрать', ['class'=> ''])?>
        <div class="container"> <a href="<?=Url::toRoute(['page/listproducts','id' => $categories['id']]);?>">
                <?=Html::Button('Очистить выбор', ['class'=> ''])?></a>
        </div>
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

        <div class="row content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
                <div class="row"><div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"></div></div></div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">


                    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod">

                    </div>
                </div>
            </div>

            <?php $i=0; foreach ($property as $pro): ?>
            <?php $link_prod = Url::toRoute(['page/product','id' => $pro['products']['id']]); ?>
            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                <div class="product">
                    <a href="<?php echo $link_prod; ?>"
                    <div class="product_img"><span></span>
                        <?=Html::img($pro['products']['img'])?></a>
                        <div class="product_btn">
                            <a href="<?php echo $link_prod; ?>" class="btn1">
                                <?php echo $pro['products']['name']; ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php $i++;?> <!-- построчный вывод -->
                <?php if($i % 3 == 0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
                <?php  endforeach;?>

        </div>
