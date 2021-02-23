<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">

    <ul class="side-nav">

        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>

    </ul>
</nav>

<div class="products form large-9 medium-8 columns content">

    <?= $this->Form->create($product,array('type'=>'file')) ?>

    <fieldset>

        <legend><?= __('Add Product') ?></legend>
        <?=  $this->request->session()->read('Auth.User.Name'); ?>

        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('file', ['label' => false, 'class' => 'form-control', 'type' => 'file']) ;
            echo $this->Form->control('price');
            echo $this->Form->control('about');
            echo $this->Form->control('relese');
            echo $this->Form->control('description');
            echo $this->Form->control('ram');
            echo $this->Form->control('processor');
            echo $this->Form->control('storage');
            echo $this->Form->control('gcard');
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
         
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>
