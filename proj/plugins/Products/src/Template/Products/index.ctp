<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $products
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $cart
 */
?>
<?= $this->Html->css('base.css') ?>
<?= $this->Html->css('style.css') ?>


<style>
    .imag{
        border-radius:5px;
    }
    .imag:hover{
        opacity:80%;

    }
    .d{
        padding : 10px;
    }
    body{
        font-family: cursive;
    }
</style>
<body style="background-color: #202020;">

    <nav class="large-3 medium-4 columns" id="actions-sidebar">

        <ul class="side-nav">

            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>

        </ul>

    </nav>

    <div class="products index large-9 medium-8 columns content">

        <h3 style="color:rgb(165 165 165);"><?= __('Games') ?></h3>

        <div class="row ">

        <?php foreach ($products as $product): ?>

         <div style="width:20%;display:inline-block;color:white;" class="d">

                    
                    <?= $this->Html->link(
    $this->Html->image($product->image,array('class' => 'imag')),array('action' => 'view',$product->id), array('escape' => false));?>
                    <div class="product"><?= $this->Html->Link(__($product->name),['action' => 'view',$product->id]) ?></div>
                    <div class="product">Price<?= h($product->price) ?>$</div>
                    <div class="product">Release Date <?= h($product->relese) ?></div>
                
                    <div class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                    </div>
            
    
    </div>
    
    <?php endforeach; ?>

        </div>

    </div>
</body>