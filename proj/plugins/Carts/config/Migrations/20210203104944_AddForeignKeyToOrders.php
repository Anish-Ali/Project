<?php
use Migrations\AbstractMigration;

class AddForeignKeyToOrders extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('Carts');
        if ($table->exists() && !$table->hasColumn('product_id')) {
        $table->addColumn('product_id', 'integer', ['limit' => 10, 'null' => true ,'default' => null]);
        $table->addForeignKey('product_id',
        'products', 'id', ['delete' => 'CASCADE'])
        ->update();
        }
    
}
}
