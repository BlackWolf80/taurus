<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Цвет</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>
                    <a href="#" onclick="return clearCart()">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item):?>
                <tr>
                    <td><img src=" <?= Yii::$app->params['imgAddr'].$item['img']?>" class="small_img">


                    </td>
                    <td><?= $item['prod']?></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?> шт.</td>
                    <td><?= $item['price']?><span class="glyphicon glyphicon-rub"></span></td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach?>
            <tr>
                <td colspan="5">Итого: </td>
                <td><?= $session['cart.qty']?> товар(ов)</td>

            </tr>
            <tr>
                <td colspan="5">На сумму: </td>
                <td><?= $session['cart.sum']?><span class="glyphicon glyphicon-rub"></span></td>

            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>

