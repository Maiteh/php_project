<?php

	include_once 'Db.class.php';

	class Reservatie
	//extends Restaurant
	{
		private var $m_sNaam;
		private var $m_iPersonen;
		private var $m_iTijd;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'Naam':
					$this->m_sNaam = $p_vValue;
					break;
				
				case 'Personen':
					$this->m_iPersonen = $p_vValue;
					break;

				case 'Tijd':
					$this->m_iTijd = $p_vValue;
					break;

				default:
					
					break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) 
			{
				case 'Naam':
					return $this->m_sNaam;
					break;

				case 'Personen':
					return $this->m_iPersonen;
					break;

				case 'Tijd':
					return $this->m_iTijd;
					break;
				
				default:
					
					break;
			}
		}


		public function Save()
		{
            $db = new Db();
            $sql = "insert into tbl_reservaties (naam, personen, tijd) 
            		values ('". $db->conn->real_escape_string($this->m_sNaam) ."', 
            				'" . $db->conn->real_escape_string($this->m_iPersonen) . "', 
            				'" . $db->conn->real_escape_string($this->m_iTijd) . "')
					"; 
            $db->conn->query($sql);
		}

		public function getAll()
		{
		    $db = new Db();
        	$sql = "select * tbl_reservaties";
        	$result = $db->conn->query($sql);
        	return $result;
		}

	}

?>