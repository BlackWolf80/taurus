<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

        <div class="row">
		    <div class="col-lg-12 contant_wrap">
		    	<div class="navigation">
		    		<ul>
		    			<li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
  		    			<li><span>Каталог</span></li>
		    		</ul>
		    	</div>
		    </div>
    	</div>


     <div class="col-lg-12 col-md-9 col-sm-12 col-xs-12 catalog">
     		<div class="row_content">
				<?php foreach ($categories as $category): ?>
				<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
     				<a href="<?=Url::toRoute(['page/listproducts','id' => $category['id']]);?>"><?=Html::img(Yii::$app->params['imgAddr'].$category['img'])?></a>
     				<a href="<?=Url::toRoute(['page/listproducts','id' => $category['id']]);?>"><?php echo $category['name']; ?></a>
     			</div>
				<?php  endforeach;?>
     		</div>
     </div>

