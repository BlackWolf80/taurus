<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>




<div class="<?=$div?>">
    <div>
        <?=Html::img(Yii::$app->params['imgAddr'].$content->img)?>
        <a href="<?=Url::toRoute(['page/listproducts','id' => $content->id]);?>">
            <h2><?=$content->name;?></h2>
            <p><?=$content->description;?></br></p>
            <span>Подробнее</span>
        </a>
    </div>
</div>

