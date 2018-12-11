<?php

namespace app\components;
use app\models\Categories;
use yii\base\Widget;

class PressCategoryWidget extends Widget{
        public $var_cats;

    public function init(){
        parent::init();
        ob_start(); //буферизируем вывод
    }

    public function run()
    {
        $content = ob_get_clean();
        $div = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 ban_block ban1';
        $view = $this->var_cats;
        if($view == 2){$div = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 ban_block'; }
        $content = Categories::find ()->where ( ['id'=> $view] )->one ();
        return $this->render ( 'pres_cats' , compact ( 'content','div' ));
    }
}

