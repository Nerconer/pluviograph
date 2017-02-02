<?php
	
/*
 * Author: David Solà Solé (david.sola.sole@gmail.com)
 * Year: 2017 
 */
 
	require_once('MysqliDb.class.php');

	class Data2Bd {

		protected $data;
		protected $db;
		private $debug = 1;
		private $fake = 0;

		public function __construct() 
		{
			// host, username, password, databaseName
			$this->db = new MysqliDb('localhost', 'root', '', 'pluviograf');

			// CREA LA TAULA SI NO EXISTEIX
			if (!$this->db->tableExists ('raw_data')) {
				$this->db->rawQuery("CREATE TABLE `raw_data` (
									  `id` int(11) NOT NULL AUTO_INCREMENT,
									  `data` float(7,3) NOT NULL,
									  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
									  PRIMARY KEY (id)
									)");
			}
			else {
				if($this->debug) echo '.';
			}
		}

		public function __toString()
		{
			return "";
			//return "Data: " . $this->data ."<br/> Debug: " . $this->debug . "<br/> Fake: " . $this->fake . "<br/>"; 
		}

		public function readData() 
		{
			if($this->fake){
				$this->fake = 0;
				$this->db->rawQuery("DELETE FROM `raw_data`");
			} 
			if (isset($_POST['data']) ) {
				$data_temp = $_POST['data'];
				$data_temp = substr($data_temp, 1,8);
				$data_temp = floatval($data_temp);
				$this->data = $data_temp;

				if($this->debug) echo 'readData: Data before: ' . $data_temp . ', data processed: ' . $this->data . '<br/>';
			}
			else {
				if($this->debug) echo "readData: POST['data'] doest not exist <br/>";
			}
		}

		public function setData($data) 
		{
			$this->data = $data;
		}

		public function getTableOrdered($table)
		{
			$this->db->orderBy("time","asc");
			$this->db->orderBy("id","asc");
			return $this->db->get($table);
		}

		public function storeData() 
		{
			if(isset($this->data)) {
				if($this->debug) echo 'storeData: Current data to store: '. $this->data .'<br/>';
				$data = Array ("data" => $this->data);
				$id = $this->db->insert('data', $data);
				echo "id: ". $id . '<br/>';
			}
			else {
				if($this->debug) echo 'storeData: Trying to store empty data or fake data<br/>';
			}
		}

		public function fakeData($num)
		{
			$this->db->rawQuery("DELETE FROM `raw_data`");
			$this->fake = 1;

			$fake_data = 0.000;
			for ($i=0; $i < $num; $i++) { 
				if($i%100 === 0) {
					$fake_data = 0.000;
				}
				$data = Array ("data" => $fake_data);
				$id = $this->db->insert('raw_data', $data);
				$fake_data+=0.100;
			}
		}

		public function updateYear($num, $table) {
			$this->db->orderBy("time","desc");
			$this->db->orderBy("id","desc");
			$res = $this->db->get($table);
			
			$i=0;
			foreach ($res as $indv) {
				$time = strtotime('+2 years +10 days', strtotime($indv['time']));
				$time = date("Y-m-d H:i:s", $time);
				echo "TIME: " . $time . "<br/>";
				$id = $indv['id'];
				$this->db->rawQuery("UPDATE `raw_data` SET `time`='$time' WHERE `id`=$id");

				++$i;
				if($i == $num)
					break;
			}
		}
	}
?>

