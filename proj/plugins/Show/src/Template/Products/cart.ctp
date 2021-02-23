<?php echo $this->Flash->render('user');
?>
<?= $this->request->session()->read('Auth.User.Name'); ?>
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
            <th scope="row"><?= __('Image') ?></th>
            <div><?= $this->Html->image( $product->image, ['data-src' => $product->image,'class' => 'imaag']); ?></div>
        </tr>
     
        <tr>
        </div>
    <div>
        <div style="background-color:red;padding:20px">
                
                <?= $this->Html->Link(__($product->price),['action' => 'add',$product->id]);echo"$"; ?>
            </div>
            
            

        

        <div class="row">
            <h4><?= __('About') ?></h4>
            <?= $this->Text->autoParagraph(h($product->about)); ?>
        </div>
    </div>

    </table>
</div>
