<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Comment extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(array(
				'id' => array(
					'type' => 'INT',
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				)));

		
		$this->dbforge->add_field(array(

			'name' => array(
				'type' => 'varchar',
				'constraint' => '240',
				
			)));

		
		$this->dbforge->add_field(array(

			'email' => array(
				'type' => 'varchar',
				'constraint' => '240',
				
			)));

		
		$this->dbforge->add_field(array(

			'comment' => array(
				'type' => 'varchar',
				'constraint' => '500',
				
			)));

		
		$this->dbforge->add_field("created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");

		$this->dbforge->add_field(array(
			'updated_at' => array(
				'type' => 'DATETIME'
		)));

		$this->dbforge->add_field(array(
			'deleted' => array(
				'type' => 'TINYINT',
				'unsigned' => TRUE,
				'default' => 0
		)));

		$this->dbforge->add_field(array(
			'deleted_at' => array(
				'type' => 'DATETIME'
		)));

		
		// Add id as primary key
		$this->dbforge->add_key('id', TRUE);

		if($this->dbforge->create_table('comments'))
		{
			log_message('debug', 'Table comments created!');
		}
		else
		{
			log_message('error', 'Error on create comments table');
		}
	}

	public function down() {
		if($this->dbforge->drop_table('comments'))
		{
			log_message('debug', 'Table comments droped');
		}
		else
		{
			log_message('error', 'Error on drop comments table');
		}
	}

}

/* End of file migration.php */
/* Location: ./application/views/console/migration.php */
