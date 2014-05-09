<?php

	include_once 'Db.class.php';

	class Menu 
	//extends Restaurant
	{
		private var $m_sType;
		private var $m_sNaam;
		private var $m_iPrijs;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'Type':
					$this->m_sType = $p_vValue;
					break;
				
				case 'Naam':
					$this->m_sNaam = $p_vValue;
					break;

				case 'Prijs':
					$this->m_iPrijs = $p_vValue;
					break;

				default:
					
					break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) 
			{
				case 'Type':
					return $this->m_sType;
					break;

				case 'Naam':
					return $this->m_sNaam;
					break;

				case 'Prijs':
					return $this->m_iPrijs;
					break;
				
				default:
					
					break;
			}
		}


		public function Save()
		{
            $db = new Db();
            $sql = "insert into tbl_menu (type, naam, prijs) 
            		values ('". $db->conn->real_escape_string($this->m_sType) ."', 
            				'" . $db->conn->real_escape_string($this->m_sNaam) . "', 
            				'" . $db->conn->real_escape_string($this->m_iPrijs) . "')
					"; 
            $db->conn->query($sql);
		}

		public function getAll()
		{
		    $db = new Db();
        	$sql = "select * from tblrestaurant";
        	$result = $db->conn->query($sql);
        	return $result;
		}

	}

?>