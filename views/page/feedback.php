<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use  yii\helpers\Html;
use yii\captcha\Captcha;
?>


        <div class="row">
		    <div class="col-lg-12 contant_wrap">
		    	<div class="navigation">
		    		<ul>
		    			<li><a href="<?=Url::toRoute('site/index');?>"><i class="glyphicon glyphicon-home"></i></a></li>
  		    			<li><span>Обратная связь</span></li>
		    		</ul>
		    	</div>
		    </div>
    	</div>


<div class="row">
	

	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
			<div class="product"> <h3>Оставьте свой отзыв</h3> <br>ваше мнение очень важно для нас.</div>
		<?php $form = ActiveForm::begin(['options'=>["class" => "form-horizontal",'id' => 'callForm']]) ?>



		<div class="feedback">
			<?=$form->field($feed,'name') ?>
			<?=$form->field($feed,'email')->input('email') ?>
			<?=$form->field($feed,'text')->textarea(['rows'=>5]) ?>
			<?= $form->field($feed, 'verifyCode')->widget(Captcha::className(), [
				'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14">{input}</div></div>',]) ?>
			<div class="capcha_des"> (чтобы обновить код кликните по нему мышью.)</div>
			<?=Html::submitButton('Отправить', ['class'=> 'add_call'])?>
		</div>

		<?php ActiveForm::end() ?>


			</div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text">
				<div class="feedback"> <h2>Отзывы</h2></div>
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
				<div class="down_one">
					<div class="container-fluid">
						<?php $feed_list=array_reverse($feed_list); ?>
						<?php foreach ($feed_list as $feed_l):?>
							<div class="feedback_descriptor">
								<span>Автор:<?=$feed_l['name'].' - '.date("d.m.Y [H:i]", strtotime($feed_l['date'])); ?></span></br>
								<?=$feed_l['text']; ?>
							</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

