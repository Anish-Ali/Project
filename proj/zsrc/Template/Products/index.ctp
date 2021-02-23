<!-- $this->Html is the form helper object that contain code snippets for html elements like forms,links,etc
	link() method generate html link
 -->
<h1>Blog products</h1>
<p><?= $this->Html->link('Add Product', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $products query object, printing out product info -->

    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product->id ?></td>
        <td>
            <?= $this->Html->link($product->title, ['action' => 'view', $product->id]) ?>
        </td>
       
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $product->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $product->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
	<tr>
	<?php  if ($this->request->session()->read('Auth.User')){ ?>
		<td> <?=$this->Html->Link(__('Log out'),['controller'=>'users','action'=>'logout']) ?>  </td>
	<?php }else{  ?>
		<td> <?=$this->Html->Link(__('Login'),['controller'=>'users','action'=>'login']) ?>  </td>	
	<?php } ?>
	
	</tr>
</table>