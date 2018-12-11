<table>
    <tr><td colspan="2"><?php echo 'Заказ № <b>'.$order->id.'</b>';?></td></tr>
    <tr><td colspan="2">Клиент:</td></tr>
    <tr>
        <td colspan="2"><b><?=$order->last_name.'  '.$order->name?></b></td>
    </tr>
    <tr>
        <td colspan="2">контактные данные:</td>
    </tr>
    <tr>
        <td>телефон:<b><?='  '.$order->phone?></b></td>
        <td>E-mail:<b>
                <a href="mailto:<?=$order->email?>"><?='  '.$order->email?></a></b></td>
    </tr>
    <tr><td colspan="3">адрес доставки:<b>
                <a href="https://yandex.ru/maps/?mode=search&text=<?=$order->address?>" target="_blank">
                    <?='  '.$order->address?></a>
            </b></td></tr>
</table>

<br><br>

<div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Цвет</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item):?>
                    <td><?= $item['prod']?></td>
                    <td><?= $item['name']?></td>
                    <td><?= $item['qty']?> шт.</td>
                    <td><?= $item['price']?><span class="glyphicon glyphicon-rub"></span></td>
                    <td><?= $item['price'] * $item['qty']?> руб.</td>
                </tr>
            <?php endforeach?>
            <tr>
                <td colspan="5">Итого: </td>
                <td><?= $session['cart.qty']?> товар(ов)</td>

            </tr>
            <tr>
                <td colspan="5">На сумму: </td>
                <td><?= $session['cart.sum']?> руб.</td>
            </tr>
            </tbody>
        </table>
    </div>

