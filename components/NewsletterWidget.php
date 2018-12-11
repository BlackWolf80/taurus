<?php

namespace app\components;
use app\models\Newsletter;
use app\models\NewsletterForm;
use yii\base\Widget;

class NewsletterWidget extends Widget{
        public $var_view;

    public function init(){
        parent::init();
    }

    public function run()
    {


//        $feed_list=Feeback::find()->asArray()->all();
//
//        $feed = new FeedbackForm();
//
//
//        return $this->render ( 'feedback', compact('feed_list','feed'));

        $nf_list = Newsletter::find ()->asArray ()->all ();
        $nl_form = new NewsletterForm();

        return $this->render ( 'newsletter' , compact ( 'nf_list','nl_form' ) );
    }
}

