<?php 

	namespace App\Support;
	
	/**
	 * Database management
	 */
	abstract class Database
	{
		
		private $db_host = 'localhost';
		private $db_user = 'root';
		private $db_pass = '';
		private $db_name = 'st_crud_one';
		private $connect;

		private function dbConnect()
		{
			$this -> $connect = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		}
		
	}




