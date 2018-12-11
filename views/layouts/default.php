<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use app\assets\DefaultAsset;
DefaultAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<header>
      <div class="container">
        <div class="row header_top">
          <div class="logo col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="<?=Url::toRoute('/site/index');?>"><?=Html::img('/images/logo.png')?></a>
          </div>
          <div class="btn_top_wrap col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="btn_and_search">
              <div class="btn_top">
                  <a href="<?=Url::toRoute('/page/feedback');?>"><i class="glyphicon glyphicon-map-marker"></i>Обратная связь</a>
                  <a href="<?=Url::toRoute('/page/callback');?>"><i class="glyphicon glyphicon-phone"></i>Заказать звонок</a>
                  <a href="#" onclick="return getWish()"><i class="glyphicon glyphicon-star"></i>Список пожеланий</a>
                  <a href="<?=Url::to (['/partner/']) ?>"><i class="glyphicon glyphicon-user"></i>Личный кабинет</a>
              </div>

              <div class="search_top">
                  <form method="get" action="<?=Url::to(['/page/search'])?>">
                    <input placeholder="Поиск" type="text" name="q">
                    <button type="submit" name="submit_search">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </form>
              </div>


            </div>
                <div class="cart_top">
                  <a href="#" onclick="return getCart()">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                    <span><?php $cart_size=''; echo 'Корзина';  ?></span>
                  </a>
                </div>
          </div>

                <?=\app\components\NameprintWidget::widget ();?>
        </div>
      </div>

    <div id="stick_menu">  
       <div class="container-fluid menu_top">
        <div class="container">
          <div class="row">
             <nav>
                    <?php 
                        NavBar::begin([
                            'brandUrl' => Yii::$app->homeUrl,
                            'options' => [
                                'class' => ' ',
                            ],
                        ]);
                        echo Nav::widget([
                            'options' => ['class' => 'navbar-nav'],
                            'items' => [
                                ['label' => 'Главная', 'url' => ['/site/index']],
                                ['label' => 'Каталог', 'url' => ['/page/catalog']],
                                ['label' => 'Новости', 'url' => ['/page/news']],
                                ['label' => 'О компании', 'url' => ['/page/about']],
                                ['label' => 'Контакты', 'url' => ['/page/contacts']],
                            ],
                        ]);
                        NavBar::end();
                    ?>
              </nav>
          </div>
        </div>
      </div>
    </div>
    </header>

    <div class="container">
        <?= $content ?>
    </div>

</div>
    <div class="container-fluid write_email_and_sseti">
        <div class="container">
            <div class="row write_email_and_sseti_wrap">
                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 write_email">
                  <p>Рассылка</p>
                  <form>
                      <button type="submit" class="send-btn">
                          <i class="glyphicon glyphicon-chevron-right"> </i>
                      </button>
                      <input type="text" id="email-send" placeholder="Введите E-mail">
                  </form>
              </div>
                <?=\app\components\ShowSocialWidget::widget ();?>
          </div>
        </div>
    </div>

<?php



$link_cart = '<a href="'.Url::to (['/cart/view']).'" class="btn btn-success">Оформить заказ</a>';
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить выбор товаров</button>
       <a href=" '. Url::to (['/cart/view']). ' " class="btn btn-success">Оформить заказ</a>'

]);

\yii\bootstrap\Modal::end();
?>

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Список пожеланий</h2>',
    'id' => 'wish',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>']);
\yii\bootstrap\Modal::end();
?>

<?php
\yii\bootstrap\Modal::begin([
    'header' => '',
    'id' => 'callback',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>']);
\yii\bootstrap\Modal::end();
?>

<?php
\yii\bootstrap\Modal::begin([
    'header' => '',
    'id' => 'ord_sh',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>']);
\yii\bootstrap\Modal::end();
?>

    <div class="container-fluid footer">
      <div class="container">
 		<div class="row menu_footer_and_contact">
            <?=\app\components\ShowBottomMenuWidget::widget ();?>
            <?=\app\components\ShowAddressWidget::widget ();?>
        <div class="row">
          <div class="col-lg-12 copy">
            <p>© ООО "Таурус"  2017</p>
          </div>
        </div>
      </div>
    </div>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
