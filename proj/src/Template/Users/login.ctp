
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Page</title>
    <?= $this->Html->css('aba.css') ?>

</head>
<body class="body">
    <div class="bga">
        <div class="box">
            <div class="login"> 

                <h1 style="text-align:center;color: rgb(165 165 165);"><i>Login</i></h1>


                    <?= $this->Form->create() ?>
                    <?= $this->Form->control(__('Name'),['label'=> false,'class'=>'fom','placeholder' => 'Name']); ?>
                    <?= $this->Form->control(__('Email'),['label'=> false,'class'=>'fom','placeholder' => 'Email Address']); ?>
                    <?= $this->Form->control(__('Password'),['label'=> false,'class'=>'fom','placeholder' => 'Password']); ?>
                    <?= $this->Form->button(__('Login'),['class'=>'tee']) ?>
        <br>
        <br>

        <?= $this->Html->link(__('Register'),['controller' => 'Users','action' => 'add']) ?>
        <?= $this->Form->end() ?>

            </div>
        </div>
    </div>

</body>
</html>


