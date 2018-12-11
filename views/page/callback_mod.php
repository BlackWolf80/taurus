<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use  yii\helpers\Html;
use yii\captcha\Captcha;
?>
<div class="container">
<div class="row">
	<div class="feedback"> <h2>Тут вы можете заказать обратный звонок.</h2></div>
<div class="product"> Пожалуйста запомните форму и наш менеджер обязательно свяжется с вами.</div>
</div>

<?php $form = ActiveForm::begin(['options'=>["class" => "form-horizontal",'id' => 'callForm']]) ?>



<?php if (Yii::$app->session->hasFlash('success')) :?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong><?php echo Yii::$app->session->getFlash('success'); ?></strong>
	</div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')) :?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Внимание!</strong> <?php echo Yii::$app->session->getFlash('error'); ?>
	</div>
<?php endif; ?>



<?=$form->field($model,'name') ?>
<?=$form->field($model,'phons')->input('text') ?>
<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
	'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-2">{input}</div></div>',]) ?>
<div class="capcha_des"> (чтобы обновить код кликните по нему мышью.)</div>
<?=Html::submitButton('Отправить', ['class'=> 'add_call'])?>
<?php ActiveForm::end() ?>

</div>