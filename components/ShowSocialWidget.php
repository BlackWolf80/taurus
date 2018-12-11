<?php

namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class ShowSocialWidget extends Widget{


    public function init(){
        parent::init();
    }

    public function run()
    {
        echo'
        <div class="col-lg-6 col-md-6 col-sm-5 hidden-xs sseti_wrap">
    				<div>'
            .Html::a ('<i class="fa fa-vk"></i>',Url::to ('https://vk.com/id475466707'),['target'=>'_blank'])
            .Html::a ('<i class="fa fa-odnoklassniki"></i>',Url::to ('https://ok.ru/profile/588438257715'),['target'=>'_blank'])
            .Html::a ('<i class="fa fa-twitter"></i>',Url::to ('https://twitter.com/Ulgran1'),['target'=>'_blank'])
            .Html::a ('<i class="fa fa-facebook"></i>',Url::to ('https://www.facebook.com/profile.php?id=100009299647883'),['target'=>'_blank'])
            .Html::a ('<i class="fa fa-instagram"></i>',Url::to ('https://www.instagram.com/moyki_krd')).
            '</div>
    			</div>
        
        ';

    }
}

