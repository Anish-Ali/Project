<?php
/**
 * @var \App\View\AppView $this
//  * @var \Cake\Datasource\EntityInterface $product
 * @var \Cake\Datasource\EntityInterface $cart
 */
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-color: #121212;

        }
        .ht{
            
            width: 400px;
            height: 479px;
            float: right;
            border-radius: 0px;
            margin-right: 31%;
            margin-top: 8%; 
        }
        .pp{
            color:white;
            margin-top:27px;
        }
        .ppp{
            color:white;
            margin-top:27px;
            font-size:10px;
        }
        .p{
            
            color:white;
        }
        .center{
            color:white;

            text-align:center;
        }
        .showw{

        }
        .hy{
            background-color: #424242;
            width: auto;
            height: auto;
            background-repeat: no-repeat;
            margin-top: -21px;
        }
        .data a ,i{
            color:white;
            text-decoration:none;
        }
        li a {
            margin: 41px 0px 0px 88px;
            background-color: #2b2b2b;
            padding: 11px;
            border: 1px solid #383838ad;
            border-radius: 8px;
            -webkit-text-stroke: #272727;
            font-variant: all-small-caps;
            color: white;
            width: 278px;
            letter-spacing: 2px;
        }
        li a:hover{
            background-color: red;
            font-variant: all-small-caps;
            transition: 0.6s;
            letter-spacing: 11px;
        }
    </style>
</head>

<?= $this->Html->css('nav.css') ?>

<body>
<div class="bga">

    <div class="ht">
    <!--  -->
        <div style="display:flex;" class="hy">
        <tr>
            

                <?= $cart->has('product') ? $this->Html->link($cart->product->name, ['controller' => 'Products', 'action' => 'view', $cart->product->id]) : '' ?>

                <br>
                <div class="data">


                    <p class="p"><b> Quantity : </b><em><?= h($cart->quantity) ?></em></p>
                    <i class="fa fa-trash"> </i> <?= $this->Form->postLink(__('Delete'), ['action' => 'del','class' => 'tyyy', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id)]) ?>
                    
                </div>
           
           
            
        </tr> </div>
        <li><?= $this->Html->link(__('Check-Out'),['class'=>'teeaa','action' => 'checkout']) ?></li>
        <li><?= $this->Html->link(__('Continue Shopping'),['action'=>'index','class'=>'teeaa']) ?></li>
    </div>


</div>

</body>