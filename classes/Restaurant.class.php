<?php

	include_once("DB.class.php");

	class Restaurant 
	{
		private $m_sName;
		private $m_sAddress;
		private $m_sZip;
		private $m_sCity;
		private $m_sEmail;
		private $m_sPhone;
		private $m_iUserId;

		public function __SET($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'Name':

					if ($p_vValue == "") {
						throw new Exception("Fill in a name");
					}
					else {
						$this->m_sName = $p_vValue;
					}
					break;
					

				case 'Address':
					$this->m_sAddress = $p_vValue;
					break;

				case 'Zip':
					$this->m_sZip = $p_vValue;
					break;

				case 'City':
					$this->m_sCity = $p_vValue;
					break;

				case 'Email':
					$this->m_sEmail = $p_vValue;
					break;

				case 'Phone':
					$this->m_sPhone = $p_vValue;
					break;
				
				case 'UserId':
					$this->m_iUserId = $p_vValue;
					break;

				default:
					break;
			}
		}

		public function __GET($p_sProperty)
		{
			switch ($p_sProperty) 
			{				
				case 'Name':
					return $this->m_sName;
					break;

				case 'Address':
					return $this->m_sAddress;
					break;

				case 'Zip':
					return $this->m_sZip;
					break;

				case 'City':
					return $this->m_sCity;
					break;

				case 'Email':
					return $this->m_sEmail;
					break;

				case 'Phone':
					return $this->m_sPhone;
					break;

				case 'UserId':
					return $this->m_iUserId;
					break;
				
				default:
					
					break;
			}
		}


		public function Save()
		{
            $db = new DB();

            if (!$db->conn->connect_errno) 
            {
	        $sql = "insert into tblrestaurant
	            (
		            Restaurant_Naam,  
		            Restaurant_Adres,
		            Restaurant_Postcode,
					Restaurant_Gemeente,
					Restaurant_Website,
					Restaurant_Email,
					Restaurant_Telefoonnr,
					Restaurant_GSM,
					fk_gebruiker_id
				)

	            values ('" . $db->conn->real_escape_string($this->m_sNaam) ."',  
	            		'" . $db->conn->real_escape_string($this->m_sAdres) . "',
	            		'" . $db->conn->real_escape_string($this->m_sPostcode) . "',
	            		'" . $db->conn->real_escape_string($this->m_sGemeente) . "',
	           			'" . $db->conn->real_escape_string($this->m_sWebsite) . "',
	         			'" . $db->conn->real_escape_string($this->m_sEmail) . "',
	            		'" . $db->conn->real_escape_string($this->m_sTelNummer) . "',
	           			'" . $db->conn->real_escape_string($this->m_sGsmNummer) . "',
	           			'" . $db->conn->real_escape_string($this->m_iGebruikerId) . "'
	            		);";
	            $db->conn->query($sql);
            }
            else
            {
            	echo "DB link failed";
            }
           
		}

		public function getAll($id)
		{
		    $db = new DB();
        	$sql = "SELECT * 
					FROM tblrestaurant
					WHERE fk_user_id = $id";
			
        	$result = $db->conn->query($sql);
        	
        	return $result;
		}

	}

?>