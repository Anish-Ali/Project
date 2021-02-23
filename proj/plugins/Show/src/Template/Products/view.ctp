<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */

?>
<?= $this->Html->css('nav.css') ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="products view large-9 medium-8 columns content" style="color:white;background-color: #2b2b2b">
    <h3 style="text-align:center;font-size:50px;font-style:italic;color:#cecece"><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <div><?= $this->Html->image( $product->image, ['data-src' => $product->image,'class' => 'imaag']); ?></div>
        </tr>
        <tr>
        <div class="row">
            <div class="des">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div></div>
            <br><br><br><br><br><br><br><br>
            <br><br><br>
            <div style="background-color:red;padding:20px">
            
            <?= $this->Html->Link(__($product->price),['action' => 'add',$product->id]);echo"$"; ?>
</div>
        </tr>
        <tr>
            <div style="background-color:red">
            <th scope="row"><?= __('Ram') ?></th>
            <td><?= h($product->ram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Processor') ?></th>
            <td><?= h($product->processor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Storage') ?></th>
            <td><?= h($product->storage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gcard') ?></th>
            <td><?= h($product->gcard) ?></td>
        </tr>
        </div>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relese') ?></th>
            <td><?= h($product->relese) ?></td>
        </tr>
    </table>

    <div class="row">
        <h4><?= __('About') ?></h4>
        <?= $this->Text->autoParagraph(h($product->about)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>

</div>
