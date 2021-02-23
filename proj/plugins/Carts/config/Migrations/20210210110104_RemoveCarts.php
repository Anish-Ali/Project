<?php
use Migrations\AbstractMigration;

class RemoveCarts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('Carts');
        if($table->exists()){

    
        $table->removeColumn('Name');
        $table->removeColumn('Price');
        $table->removeColumn('Image')
              ->save();
    }    }
}
