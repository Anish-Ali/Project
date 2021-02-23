<?php
use Migrations\AbstractMigration;

class DeleteColumn extends AbstractMigration
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
        $table = $this->table('users');
        $table
            ->dropForeignKey(
                // by columns used in the constraint, this would remove _all_
                // foreign key constraints on the table that are using the
                // `province_id` column
                'province_id',
        
                // optionally pass the name of the constraint in the second
                // argument instead, in order to remove only a specific single
                // constraint by its name
                'foreign_key_constraint_name'
            )
            ->removeIndex('province_id')
            ->removeColumn('province_id')
            ->update();
        }
    }

