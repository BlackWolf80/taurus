<?php

namespace app\components;

use app\models\User;
use yii\base\Widget;
use Yii;

class NameprintWidget extends Widget{


    public function init(){
        parent::init();
    }

    public function run()
    {
        $user_id = Yii::$app->user->id;

        $user = User::findOne ($user_id);

        return $this->render ( 'name_print' , compact ( 'user' ) );
    }
}

