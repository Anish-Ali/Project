<?php
use Migrations\AbstractMigration;

class AddForeignKey extends AbstractMigration
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
        $table = $this->table('Products');
        if ($table->exists() && !$table->hasColumn('category_id')) {
        $table->addColumn('category_id', 'integer', ['limit' => 100, 'null' => true ,'default' => null]);
        $table->addForeignKey('category_id',
        'categories', 'id', ['delete' => 'CASCADE'])
        ->update();
        }
    }
}
