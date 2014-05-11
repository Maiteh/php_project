<?php

	include_once('Db.class.php');

	class Menu {

		private $m_iType;
		private $m_sName;
		private $m_iPrijs;

		public function __SET($p_sProperty, $p_vValue){
			switch ($p_sProperty) {

				case 'Type':
					if ($p_vValue == "none") {
						throw new Exception("Give a type");
					} else {
						$this->m_iType = $p_vValue;
					}
					break;
				
				case 'Name':
					if ($p_vValue == "") {
						throw new Exception("Give a name");
					} else {
						$this->m_sName = $p_vValue;
					}
					break;

				case 'Price':
					if ($p_vValue == "") {
						throw new Exception("Give a price");
					} else {
						$this->m_iPrice = $p_vValue;
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
					return $this->m_sName;
					break;

				case 'Price':
					return $this->m_iPrice;
					break;
				
				default:
					
					break;
			}
		}


		public function Save() {
            $db = new Db();
            if ($db->conn->connect_errno) {
            	echo "Where's yo database";
            } else {
            	$sql = "insert into tblmenu (fk_type_id, menu_name, menu_price) 
            		values (
            				'" . $db->conn->real_escape_string($this->m_iType) ."', 
            				'" . $db->conn->real_escape_string($this->m_sName) . "', 
            				'" . $db->conn->real_escape_string($this->m_iPrice) . "'
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