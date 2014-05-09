<?php

	include_once('Db.class.php');

	class Menu {

		private $m_iType;
		private $m_sNaam;
		private $m_iPrijs;

		public function __SET($p_sProperty, $p_vValue){
			switch ($p_sProperty) {

				case 'Type':
					if ($p_vValue) {
						$this->m_iType = $p_vValue;
					} else {
						
						throw new Exception("Give a type");
					}
					break;
				
				case 'Name':
					if ($p_vValue == "") {
						throw new Exception("Give a name");
					} else {
						$this->m_sNaam = $p_vValue;
					}
					break;

				case 'Price':
					if ($p_vValue == "") {
						throw new Exception("Give a price");
					} else {
						$this->m_iPrijs = $p_vValue;
					}
					break;

				default:
					
					break;
			}
		}

		public function __GET($p_sProperty){
			switch ($p_sProperty) 
			{
				case 'Type':
					return $this->m_sType;
					break;

				case 'Name':
					return $this->m_sNaam;
					break;

				case 'Price':
					return $this->m_iPrijs;
					break;
				
				default:
					
					break;
			}
		}


		public function Save() {
            $db = new Db();
            if ($db->conn->connect_errno()) {
            	echo "Where's yo database";
            } else {
            	$sql = "insert into tblmenu (Menu_Gerecht, Menu_Beschrijving, Menu_Prijs) 
            		values (
            				'" . $db->conn->real_escape_string($this->m_sType) ."', 
            				'" . $db->conn->real_escape_string($this->m_sNaam) . "', 
            				'" . $db->conn->real_escape_string($this->m_iPrijs) . "'
            				);"; 
            $db->conn->query($sql);
            }
		}

		public function getAll()
		{
		    $db = new Db();
        	$sql = "select * tblmenu";
        	$result = $db->conn->query($sql);
        	return $result;
		}

	}

?>