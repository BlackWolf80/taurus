
<table>
    <tr>
        <td colspan="2"><?php echo 'Здравствуйте '.$order->last_name.'  '.$order->name. '<br>';?></td>
    </tr>
    <tr><td colspan="2"><?php echo 'Ваш заказ №  <b>'.$order->id.'</b> в Taurus-market';?></td></tr>
</table>

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


            <?php if($order->discount != null){$allSumm=$session['cart.sum']-$order->discount;
                echo '<tr><td>Скидка:</td><td>10%</td><td>по карте № </td><td>'.$order->card_id.'</td></tr><tr><td>Итого к оплате:</td>
                     <td>'.$allSumm.'</td></tr>';
            }
            ?>

            </tbody>
        </table>
    </div>
<?='Наш менеджер свяжется с вами в ближайшее время. <br>'?>
<?='С уважением администрация  <a href="market.taurus-plastik.ru">Таурус-market</a><br>'?>

