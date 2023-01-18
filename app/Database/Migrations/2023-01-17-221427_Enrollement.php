<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enrollement extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idenrollement'=>['type'=> 'INT','auto_increment'=>true],
            'yearenrollement'=> ['type'=> 'date','null'=>false],
            'idstudent'=>['type'=> 'INT'],
            'idlevel'=>['type'=> 'INT'],
            'idspecialty'=>['type'=> 'INT'],
            'user_updated_at datetime default current_timestamp on update current_timestamp',
            'user_create_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('idenrollement', true);
        $this->forge->addForeignKey('idstudent','student','idstudent');
        $this->forge->addForeignKey('idlevel','level','idlevel');
        $this->forge->addForeignKey('idspecialty','specialty','idspecialty');
        $this->forge->createTable('enrollement');
    }

    public function down()
    {
        $this->forge->dropTable('enrollement');
    }
}
