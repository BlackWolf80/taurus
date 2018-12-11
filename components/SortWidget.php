<?php

namespace app\components;
use Yii;
use yii\base\Widget;

class SortWidget extends Widget{
    public $category;

    public function init(){
        parent::init();
    }

    public function run()
    {

        $category = $this->category;

        return $this->render ( 'sort_view' , compact ( 'view','category' ) );
    }
}