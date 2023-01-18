<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Department extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'iddepartment'=>['type'=> 'INT','auto_increment'=>true],
            'namedepartment'=> ['type'=> 'text','null'=>false],
            'user_updated_at datetime default current_timestamp on update current_timestamp',
            'user_create_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('iddepartment', true);
        $this->forge->createTable('department');
    }

    public function down()
    {
        $this->forge->dropTable('department');
    }
}
