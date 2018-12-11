<?php

namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class ShowBottomMenuWidget extends Widget{


    public function init(){
        parent::init();
    }

    public function run()
    {
        echo '
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
	    			<div class="footer_menu">
		    			<h3>Категории</h3>
		    			<ul>
		    				<li>'.Html::a ('Главная',Url::toRoute('/')).'</li>
		    				<li>'.Html::a ('Каталог',Url::toRoute('/page/catalog')).'</li>
		    				<li>'.Html::a ('Новости',Url::toRoute('/page/news')).'</li>
		    				<li>'.Html::a ('О компании',Url::toRoute('/page/about')).'</li>
		    				<li>'.Html::a ('Контакты',Url::toRoute('/page/contacts')).'</li>
		    			</ul>
	    			</div>
	    			<div class="footer_menu">
		    			<h3>Информация</h3>
		    			<ul>
                            <li>'.Html::a ('Доставка',Url::toRoute('/page/shipment')).'</li>
                            <li>'.Html::a ('Оплата',Url::toRoute('/page/pm')).'</li>
                            <li>'.Html::a ('Скидки',Url::toRoute('/page/discount')).'</li>
		    				<li>'.Html::a ('Карта сайта',Url::toRoute('/page/site_map')).'</li>
		    			</ul>
	    			</div>
	    			<div class="footer_menu">
		    			<h3>Разное</h3>
		    			<ul>
		    			    <li>'.Html::a ('Обратная связь',Url::toRoute('/page/feedback')).'</li>
		    			    <li>'.Html::a ('Заказать звонок',Url::toRoute('/page/callback')).'</li>
		    			</ul>
	    			</div>
	    		</div>
        ';

    }
}

