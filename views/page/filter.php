<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\components\SortWidget;
?>


<div class="row">







<!--    --><?php
//        $property=\app\models\Property::find ()->with ('products')->where   (['value' => 'круглая'])->asArray ()->all ();

//    ?>
    <?=SortWidget::widget (['category' => 1,'var'=> 1]);?>

</div>