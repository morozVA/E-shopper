<?php

use yii\helpers\Html;

if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item) : ?>
                <tr>
                    <td><?= Html::img('@web/images/products/' . $item['img'], ['alt' => $item['name'], 'height' => 50]); ?></td>
                    <td><?= $item['name']; ?></td>
                    <td><?= $item['qty']; ?></td>
                    <td><?= $item['price']; ?></td>
                    <td><span data-id="<?= $id; ?>" aria-hidden="true"
                              class="text-danger del-item glyphicon glyphicon-remove"></span></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Итого:</td>
                <td><?= $session['cart.qty']; ?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму:</td>
                <td><?= $session['cart.sum']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
