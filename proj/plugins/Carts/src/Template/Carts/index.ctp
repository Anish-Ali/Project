<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $carts
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cart'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>

    </ul>
</nav>
<div class="carts index large-9 medium-8 columns content">
    <h3><?= __('Carts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carts as $cart): ?>
            <tr>
                <td><?= $this->Number->format($cart->id) ?></td>
                <td><?= h($cart->quantity) ?></td>
                <td><?= h($cart->created) ?></td>
                <td><?= $cart->has('product') ? $this->Html->link($cart->product->name, ['controller' => 'Products', 'action' => 'view', $cart->product->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cart->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cart->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
