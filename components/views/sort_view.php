<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<form method="get" action="<?=Url::to(['/page/sort'])?>">
<?php

$t1=$t2=$t3=$t4=$t5=$t6=$t7=$t8=false;?>
<?php if ($category ==1 ):?>


    <hr width="100%"><label>По типу</label>
    <div class="filter_check">

        <p><input type="checkbox" name="type1"<?php if(isset($_GET['type1'])){echo 'checked'; } ?>/>Круглые</p>
        <p><input type="checkbox" name="type2"<?php if(isset($_GET['type2'])){echo 'checked'; } ?>/>Прямоугольные</p>
        <p><input type="checkbox" name="type3"<?php if(isset($_GET['type3'])){echo 'checked'; } ?>/>Квадратные</p>
        <p><input type="checkbox" name="type4"<?php if(isset($_GET['type4'])){echo 'checked'; } ?>/>Овальные</p>
        <p><input type="checkbox" name="type5"<?php if(isset($_GET['type5'])){echo 'checked'; } ?>/>Угловые</p>
        <p><input type="checkbox" name="type6"<?php if(isset($_GET['type6'])){echo 'checked'; } ?>/>С крылом</p>
        <p><input type="checkbox" name="type7"<?php if(isset($_GET['type7'])){echo 'checked'; } ?>/>Реверсивные</p>
        <p><input type="checkbox" name="type8"<?php if(isset($_GET['type8'])){echo 'checked'; } ?>/>С двумя чашами</p>
    </div>
    <hr width="100%"><label>По размеру</label>
    <div class="filter_check">
        <p><input type="checkbox" name="type40"<?php if(isset($_GET['type40'])){echo 'checked'; } ?>/>В тумбу 40см</p>
        <p><input type="checkbox" name="type45"<?php if(isset($_GET['type45'])){echo 'checked'; } ?>/>В тумбу 45см</p>
        <p><input type="checkbox" name="type50"<?php if(isset($_GET['type50'])){echo 'checked'; } ?>/>В тумбу 50см</p>
        <p><input type="checkbox" name="type60"<?php if(isset($_GET['type60'])){echo 'checked'; } ?>/>В тумбу 60см</p>
        <p><input type="checkbox" name="type70"<?php if(isset($_GET['type70'])){echo 'checked'; } ?>/>В тумбу 70см</p>
        <p><input type="checkbox" name="type80"<?php if(isset($_GET['type80'])){echo 'checked'; } ?>/>В тумбу 80см</p>
    </div>
    <input name="id_group" value="<?=$category ?>" hidden="hidden"/>



    <?php elseif ($category ==2 ):?>

         Для этого товара фильтров нет.
    <?php endif;?>
    <hr width="100%"><?=Html::submitButton('Подобрать')?>


</form>
