<?php

namespace app\components;
use app\models\Images_products;
use yii\base\Widget;

class HitWidget extends Widget{
        public $var_view;

    public function init(){
        parent::init();
    }

    public function run()
    {
        $view = $this->var_view;
        $content = Images_products::find ()->with ( 'products' )->where ( [$view => 1] )->limit(4)->all ();
        return $this->render ( 'hit' , compact ( 'content' ) );
    }
}

