<?php
use Phinx\Migration\AbstractMigration;

class InjectStates extends AbstractMigration
{
    public function up()
    {
        $this->table('roles')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('permissions', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
                'signed' => false,
            ])
            ->create();

        $roles = [
            ['id' => 1, 'name' => 'Admin', 'permissions' => 999],
            ['id' => 2, 'name' => 'User', 'permissions' => 1]
        ];

        $this->insert('roles', $roles);
    }

    public function down()
    {
        $this->table('roles')->drop();
    }
}