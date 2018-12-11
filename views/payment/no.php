<?php
use app\components\HitWidget;
use yii\helpers\Url;
use yii\helpers\Html;
?>

<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <div class="container">
                <div class="row">
                    <?php if( Yii::$app->session->hasFlash('success') ): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                    <?php endif;?>

                    <?php if( Yii::$app->session->hasFlash('error') ): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo Yii::$app->session->getFlash('error'); ?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            Можете продолжить выбор товара.
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="col-lg-12 col-md-9 col-sm-12 col-xs-12 catalog">
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
                    <a href="<?=Url::toRoute(['page/listproducts','id' => $category['id']]);?>"><?=Html::img($category['img'])?></a>
                    <a href="<?=Url::toRoute(['page/listproducts','id' => $category['id']]);?>"><?php echo $category['name']; ?></a>
                </div>
            <?php  endforeach;?>
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