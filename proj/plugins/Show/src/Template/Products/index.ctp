<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $products
 */
?>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #f3f3f3;
}

li {
  float: left;
}

li a {
  display: block;
  color: #666;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #ddd;
}

li a.active {
  color: white;
  background-color: #4CAF50;
}
.left{
  margin-left:20px;
}
</style>
</head>
<?= $this->Html->css('nav.css') ?>
<ul>
  <li><a class="active" href="#home">Home</a></li>

  <li style="float:right"><?= $this->Html->link(__('Logout'), ['action' => 'add']) ?></li>
</ul>
<body style="background-color: #202020;">
<li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
<br>
<div class="products index large-9 medium-8 columns content">
<?= $this->request->session()->read('Auth.User.Name'); ?>
    <h3 style="color:rgb(165 165 165);"><?= __('Games') ?></h3>

    <div class="row">
    <?php foreach ($products as $product): ?>
  <div style="width:20%;display:inline-block;color:white;">
  <div style="background-color:gray;width:240px;height:382px;margin-bottom:39px;">
                
                <div style="padding:0px 0px 0px 20px"><?= $this->Html->image( $product->image, ['data-src' => $product->image, 'class' => 'imag', 'action' => 'view']); ?></div>
                <div class="left"><?= $this->Html->Link(__($product->name),['action' => 'view',$product->id]) ?></div>
                <div class="product">Price<?= h($product->price) ?>$</div>
                <div class="left">Release Date <?= h($product->relese) ?></div>
                <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $product->has('categories') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
        </tr>
               
          
  
                </div>
  </div>
  
  <?php endforeach; ?>
     
</div>

</div>
</body>