<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Specialty extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idspecialty'=>['type'=> 'INT','auto_increment'=>true],
            'name'=> ['type'=> 'text','null'=>false],
            'descspecialty'=> ['type'=> 'text','null'=>false],
            'iddepartment'=>['type'=> 'INT'],
            'user_updated_at datetime default current_timestamp on update current_timestamp',
            'user_create_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('idspecialty', true);
        $this->forge->addForeignKey('iddepartment','department','iddepartment');
        $this->forge->createTable('specialty');
    }

    public function down()
    {
        $this->forge->dropTable('specialty');
    }
}
