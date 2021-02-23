<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $product
 */
?>

<?= $this->Html->css('nav.css') ?>
<?= $this->Html->css('aba.css') ?>

<div class="bga">

    <div style="  background-color: #202020;
    width: 400px;
    height: 479px;
    float: right;
    border-radius: 0px;
    margin-right: 31%;
    margin-top: 8%;">

        <tr>
            <div>
            <p style="color:white;">name</p>
                <?= $this->Html->image( $product->image, ['data-src' => $product->image,'class' => 'imaag']); ?>
             
            </div>
        </tr>

</div>

</div>