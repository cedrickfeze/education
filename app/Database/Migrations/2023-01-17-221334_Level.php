<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idlevel'=>['type'=> 'INT','auto_increment'=>true],
            'descslevel'=> ['type'=> 'text','null'=>false],
            'user_updated_at datetime default current_timestamp on update current_timestamp',
            'user_create_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('idlevel', true);
        $this->forge->createTable('level');
    }

    public function down()
    {
        $this->forge->dropTable('level');
    }
}
