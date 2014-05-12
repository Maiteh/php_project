<?php
	include_once("DB.class.php");

	class Table
	{ 
		private $m_sNumber;
		private $m_sPerson;
		private $m_sOccupation;

		public $error = array();

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				
				case 'Number':
					if(!empty($p_vValue)){
					$this->m_sNumber = $p_vValue;
					}
					else
					{
						$this->error["errorNumber"] = "Fill in the number of this table";
					}
					break;
				
		 		case 'Person':

					if(!empty($p_vValue)){
					$this->m_sPerson = $p_vValue;
					}
					else
					{
						$this->error["errorPerson"] = "Fill in how many people can sit at this table";
					}
					break;
					

				case 'Occupation':
					if(!empty($p_vValue)){
						$this->m_sOccupation = $p_vValue * 100;
					}
					else
					{
						$this->error["errorOccupation"] = "Fill in for how long this table can be reserved";
					}
					break;
			}
		}

		public function __get($p_sProperty)
		{

			switch ($p_sProperty) 
			{
				case 'Number':
					return $this->m_sNumber;
					break;
				case 'Person':
					return $this->m_sPerson;
					break;
				case 'Occupation':
					return $this->m_sOccupation;
					break;
				
			}
		}

		public function AddTable()
		{
			$db = new DB();

			$sql = "insert into tbltafel(
						Tafel_Nummering, Tafel_AantalPersonen, Tafel_BezetTijd) 
					VALUES(
						'" . $db->conn->real_escape_string($this->m_sNumber) . "', 
						'" . $db->conn->real_escape_string($this->m_sPerson) . "', 
						'" . $db->conn->real_escape_string($this->m_sOccupation) . "'
						)
					";
			$db->conn->query($sql);
			echo $sql;
		}

	}
?>