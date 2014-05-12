<?php

	include_once('Db.class.php');

	class Menu {

		private $m_sMenu;
		private $m_sStarter;
		private $m_sMain;
		private $m_sDessert;
		private $m_iPrice;
		private $m_iRestaurantId;

		public function __SET($p_sProperty, $p_vValue) {
			switch ($p_sProperty) {

				case 'Menu':
					if (empty($p_vValue)) {
						throw new Exception("Give a menu name");
					} else {
						$this->m_sMenu = $p_vValue;
					}
					break;
				
				case 'Starter':
					if (empty($p_vValue)) {
						throw new Exception("Give a starter dish");
					} else {
						$this->m_sStarter = $p_vValue;
					}
					break;

				case 'Main':
					if (empty($p_vValue)) {
						throw new Exception("Give a main dish");
					} else {
						$this->m_sMain = $p_vValue;
					}
					break;

				case 'Dessert':
					if (empty($p_vValue)) {
						throw new Exception("Give a dessert");
					} else {
						$this->m_sDessert = $p_vValue;
					}
					break;

				case 'Price':
					if (empty($p_vValue)) {
						throw new Exception("Give a price");
					} else {
						$this->m_iPrice = $p_vValue;
					}
					break;

				case 'RestaurantId':
					if (empty($p_vValue)) {
							throw new Exception("Give a price");
					} else {
						$this->m_iRestaurantId = $p_vValue;
					}
					break;

				default:
					
					break;
			}
		}

		public function __GET($p_sProperty) {
			switch ($p_sProperty) 
			{
				case 'Menu':
					return $this->m_sMenu;
					break;

				case 'Starter':
					return $this->m_sStarter;
					break;

				case 'Main':
					return $this->m_sMain;
					break;

				case 'Dessert':
					return $this->m_sDessert;
					break;

				case 'Price':
					return $this->m_iPrice;
					break;

				case 'RestaurantId':
					return $this->m_iRestaurantId;
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
            	$sql = "insert into tblmenu (menu_name, menu_starter, menu_main, menu_dessert, menu_price, fk_restaurant_id) 
            		values (
            				'" . $db->conn->real_escape_string($this->m_sMenu) ."', 
            				'" . $db->conn->real_escape_string($this->m_sStarter) . "',
            				'" . $db->conn->real_escape_string($this->m_sMain) . "', 
            				'" . $db->conn->real_escape_string($this->m_sDessert) . "', 
            				'" . $db->conn->real_escape_string($this->m_iPrice) . "',  
            				'" . $db->conn->real_escape_string($this->m_iRestaurantId) . "'
            				);";
				//echo $sql;
            	$db->conn->query($sql);
            }
		}

		public function getMenus() {
		    $db = new Db();

			if (!$db->conn->connect_errno) {
				$sql = "SELECT * FROM tblmenu
						WHERE fk_restaurant_id = ";
				$allMenus = $db->conn->query($sql);

				return $allMenus;
			}
		}

		public function updateMenu() {

		}

		public function deleteMenu() {
		}

	}

?>