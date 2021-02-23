<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!DOCTYPE html>
<html lang="en">

    <body>

        <?= $this->Html->css('aba.css') ?>

        <div class="bga">

            <div class="boox">

                <div class="users form register"   style="background-color:rgb(0,0,0,0.);">

                    <?= $this->Form->create($user) ?>
            
                        <div style="text-align: center;margin-top: 20px;font-size: 29px;font-style: italic;color: white;">Register Admin</div>
                            <?php

                                echo $this->Flash->render('auth');
                                echo $this->Form->create($user);
                                echo $this->Form->input(__('Name'),['label'=> false,'class'=>'fom','placeholder' => 'Name']);
                                echo $this->Form->input(__('Email'),['label'=> false,'class'=>'fom','placeholder' => 'Email Address']);
                                echo $this->Form->input(__('Password'),['label'=> false,'class'=>'fom','placeholder' => 'Password']);

                             ?>
                
                    <?= $this->Form->button(__('Register'),['class'=>'tee']) ?>

                    <br><br><br>

                    <?= $this->Html->link(__('Click Here to Login'),['controller' => 'Users','action' => 'login']) ?>

                    <?= $this->Form->end() ?>
                </div>

            </div>

        </div>

    </body>
    
</html>

