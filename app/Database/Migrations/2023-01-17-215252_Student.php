<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Student extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idstudent'=>['type'=> 'INT','auto_increment'=>true],
            'fname'=> ['type'=> 'text','null'=>false],
            'lname'=> ['type'=> 'text','null'=>false],
            'birth'=> ['type'=> 'date','null'=>false],
            'user_updated_at datetime default current_timestamp on update current_timestamp',
            'user_create_at datetime default current_timestamp',
        ]);
        $this->forge->addKey('idstudent', true);
        $this->forge->createTable('student');
    }

    public function down()
    {
        $this->forge->dropTable('student');
    }
}
