<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>

<?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
<ul style="display:flex;">
        <li style="list-style-type:none;margin-left:10px;background-color:blue;padding:20px;"><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li style="list-style-type:none;margin-left:10px;background-color:blue;padding:20px;"><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li style="list-style-type:none;margin-left:10px;background-color:blue;padding:20px;"><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li style="list-style-type:none;margin-left:10px;background-color:blue;padding:20px;"><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>

        
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
