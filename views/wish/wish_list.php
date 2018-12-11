<?php use yii\helpers\Url;?>
<?php if(!empty($session['wish'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
<!--        --><?php //\app\controllers\debug ($session['wish']);?>
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Цвет</th>
                <th>Цена</th>
                <th></th>
                <th><a href="#" onclick="return clearWish()">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['wish'] as $id => $item):?>
                <tr>
                    <td><img src=" <?= '/'.$item['img']?>" class="small_img">


                    </td>
                    <td><a href="<?=Url::to(['page/product','id' => $item['prod_id']])?>"><?= $item['prod']?></a></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['price']?><span class="glyphicon glyphicon-rub"></span></td>
                    <td>
                        <span data-id="<?= $id?>" data-name="<?= $item['prod'].'  '.$item['name']?>" class="glyphicon glyphicon-shopping-cart add-cart" aria-hidden="true"></span>
                    </td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true">
                        </span></td>

                </tr>
            <?php endforeach?>

            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Список пуст</h3>
<?php endif;?>

