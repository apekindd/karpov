<?php if(!empty($session['cart'])){?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id=>$item){?>
                <tr>
                    <td><?= \yii\helpers\Html::img($item['img'], ['alt'=>$item['name'], 'height'=>50]); ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?>шт</td>
                    <td><?= $item['price'] ?>грн</td>
                    <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4">Итого:</td>
                <td colspan="2"><?= $session['cart.qty'] ?>шт</td>
            </tr>
            <tr>
                <td colspan="4">На сумму:</td>
                <td colspan="2"><?= $session['cart.sum'] ?>грн</td>
            </tr>
            </tbody>
        </table>
    </div>
<?php }else{ ?>
    <h3>Корзина пуста</h3>
<?php } ?>
