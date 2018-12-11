<?php

namespace app\components;
use app\models\Publications;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class ShowPublicationsWidget extends Widget{
    public $id;

    public function init(){
        parent::init();
    }

    public function run()
    {
        $publications = Publications::find ()->where (['id'=>$this->id])->all ();

        foreach ($publications as $publication) {
            echo $publication['body'];
        }

    }



}

