<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Aauth as AauthConfig;

class Migration_create_perm_to_group extends Migration
{
	public function up()
	{
		$config = new AauthConfig();
		$this->forge->addField([
			'perm_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'group_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
		]);
		$this->forge->addKey(['perm_id','user_id'], TRUE);
		$this->forge->createTable($config->dbTablePermToGroup, TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$config = new AauthConfig();
		$this->forge->dropTable($config->dbTablePermToGroup, true);
	}
}
