<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>



<?php $form = ActiveForm::begin(['options'=>["class" => "form-horizontal",'id' => 'nlForm']]) ?>

            <?=$form->field($nl_form,'email')->input('email') ?>
            <?=Html::submitButton('', ['class'=> 'glyphicon glyphicon-chevron-right write_email '])?>


<?php ActiveForm::end() ?>