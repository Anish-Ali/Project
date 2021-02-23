<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $costumer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Costumers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Phinxlog'), ['controller' => 'Phinxlog', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="costumers form large-9 medium-8 columns content">
    <?= $this->Form->create($costumer) ?>
    <fieldset>
        <legend><?= __('Add Costumer') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Password');
            echo $this->Form->control('Email');
            echo $this->Form->control('phinxlog._ids', ['options' => $phinxlog]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
