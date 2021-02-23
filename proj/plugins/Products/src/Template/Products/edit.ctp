<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

    <ul class="side-nav">

        <li class="heading"><?= __('Actions') ?></li>

        <li><?= $this->Form->postLink(

                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?>
        
        </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?></li>
    </ul>

</nav>

<div class="products form large-9 medium-8 columns content">

    <?= $this->Form->create($product) ?>

    <fieldset>

        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->control('nahme');
            echo $this->Form->control('image');
            echo $this->Form->control('price');
            echo $this->Form->control('about');
            echo $this->Form->control('relese');
            echo $this->Form->control('description');
            echo $this->Form->control('ram');
            echo $this->Form->control('processor');
            echo $this->Form->control('storage');
            echo $this->Form->control('gcard');
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('phinxlog._ids', ['options' => $phinxlog]);
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>

    <?= $this->Form->end() ?>
    
</div>
