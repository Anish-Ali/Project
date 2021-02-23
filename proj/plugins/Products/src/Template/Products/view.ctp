<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 * @var \Cake\Datasource\EntityInterface $cart
 */
?>
<?= $this->Html->css('nav.css') ?>

<body class="baga">

    <div class="products view large-9 medium-8 columns content" style="color:white;background-color: #2b2b2b">

        <h3 style="text-align:center;font-size:50px;font-style:italic;color:#cecece"><?= h($product->name) ?></h3>

            <table class="vertical-table">
            
                <tr>
                    <div ><?= $this->Html->image( $product->image, ['data-src' => $product->image,'class' => 'imaag']); ?></div>
                </tr>

                <tr>
                <div class="row">
                <div class="des">
                <h4><?= __('Description') ?></h4>
                <?= $this->Text->autoParagraph(h($product->description)); ?></div>

                <div class="top"> 
               

                    <div style="display:flex;">

                    <div class="pos">

                </div>

                <div class="pos mrg">
<h3>System Requirment</h3>
                    <?= __('Ram') ?>
                    <?= h($product->ram);echo"GB Required"; ?>
                    <br>

                    <?= __('Processor:') ?>
                    <?= h($product->processor) ?>

                    <br>
                    <?= __('Storage:') ?>
                    <?= h($product->storage);echo"GB Maximum"; ?>

                    <br>
                    <?= __('Graphic Card:') ?>
                    <?= h($product->gcard) ?>
                    </div>
                    
                   
                   
                   
                    </div></div>
            </table>

        <div class="carts form large-9 medium-8 columns content">

        <?= $this->Form->create($cart) ?>

            <?php
            
                echo $this->Form->control(__('quantity'),['value'=>'1','type'=>'hidden']);
                echo $this->Form->control(__('product_id'),['value'=>$product->id,'type'=>'hidden']);
                //echo $this->Form->control(__('Price'),['value'=>$product->price,'type'=>'hidden']);
                //echo $this->Form->control(__('Name'),['value'=>$product->name,'type'=>'hidden']);
                //echo $this->Form->control(__('Image'),['value'=>$product->image,'type'=>'hidden']);
            ?>
        <?= $this->Form->button(__('Add to rt'),['controller' => 'Carts','action' => 'addcart','class' => 'tee']); ?>

        <?= $this->Form->end() ?>
    </div>

    </div>

</body>
