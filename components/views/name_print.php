<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 19.10.17
 * Time: 14:40
 */

//if(!Yii::$app->user->isGuest) {
//echo 'Здравствуйте '.$user->name.'  '.$user->last_name.'.<br> На вашем счету <b>'.$user->points.'</b> баллов';}


?>

<?php if (!Yii::$app->user->isGuest) :?>
<div class="name_top">
    <i>
        Здравствуйте <?=$user->name.'  '.$user->last_name;?></br>На вашем счету <b><?=$user->points;?></b> бонусных баллов.

    </i>
</div>
<?php endif;?>

