<?php

	include_once("DB.class.php");

	class Restaurant 
	{
<<<<<<< HEAD
		private $m_sName;
		private $m_sAddress;
		private $m_sZip;
		private $m_sCity;
		private $m_sEmail;
		private $m_sPhone;
		private $m_iUserId;
=======
		private $m_sNaam;
		private $m_sVoorNaam;
		private $m_sAdres;
		private $m_sPostcode;
		private $m_sGemeente;
		private $m_sWebsite;
		private $m_sEmail;
		private $m_sTelNummer;
		private $m_sGsmNummer;
		private $m_iGebruikerId;
>>>>>>> master

		public function __SET($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
<<<<<<< HEAD
				case 'Name':

					if ($p_vValue == "") {
						throw new Exception("Fill in a name");
					}
					else {
						$this->m_sName = $p_vValue;
=======
				case 'Naam':

					if ($p_vValue == "") 
					{
						throw new Exception("Gelieve een naam in te vullen.");
					}
					else
					{
						$this->m_sNaam = $p_vValue;
>>>>>>> master
					}
					break;
					

<<<<<<< HEAD
				case 'Address':
					$this->m_sAddress = $p_vValue;
					break;

				case 'Zip':
					$this->m_sZip = $p_vValue;
					break;

				case 'City':
					$this->m_sCity = $p_vValue;
					break;

=======
				case 'VoorNaam':
					$this->m_sVoorNaam = $p_vValue;
					break;

				case 'Adres':
					$this->m_sAdres = $p_vValue;
					break;

				case 'Postcode':
					$this->m_sPostcode = $p_vValue;
					break;

				case 'Gemeente':
					$this->m_sGemeente = $p_vValue;
					break;

				case 'Website':
					$this->m_sWebsite = $p_vValue;
					break;
				
>>>>>>> master
				case 'Email':
					$this->m_sEmail = $p_vValue;
					break;

<<<<<<< HEAD
				case 'Phone':
					$this->m_sPhone = $p_vValue;
					break;
				
				case 'UserId':
					$this->m_iUserId = $p_vValue;
=======
				case 'TelNummer':
					$this->m_sTelNummer = $p_vValue;
					break;

				case 'GsmNummer':
					$this->m_sGsmNummer = $p_vValue;
					break;

				case 'GebruikerId':
					$this->m_iGebruikerId = $p_vValue;
>>>>>>> master
					break;

				default:
					break;
			}
		}

		public function __GET($p_sProperty)
		{
			switch ($p_sProperty) 
			{				
<<<<<<< HEAD
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
=======
				case 'Naam':
					return $this->m_sNaam;
					break;

				case 'VoorNaam':
					return $this->m_sVoorNaam;
					break;

				case 'Adres':
					return $this->m_sAdres;
					break;

				case 'Postcode':
					return $this->m_sPostcode;
					break;

				case 'Gemeente':
					return $this->m_sGemeente;
					break;

				case 'Website':
					return $this->m_sWebsite;
>>>>>>> master
					break;

				case 'Email':
					return $this->m_sEmail;
					break;

<<<<<<< HEAD
				case 'Phone':
					return $this->m_sPhone;
					break;

				case 'UserId':
					return $this->m_iUserId;
=======
				case 'TelNummer':
					return $this->m_sTelNummer;
					break;

				case 'GsmNummer':
					return $this->m_sGsmNummer;
					break;

				case 'GebruikerId':
					return $this->m_iGebruikerId;
>>>>>>> master
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
<<<<<<< HEAD
		            restaurant_name, 
		            restaurant_address, 
		            restaurant_zip,
		            restaurant_city,
					restaurant_email,
					restaurant_phone,
					fk_user_id
				)

	            values ('" . $db->conn->real_escape_string($this->m_sName) ."', 
	            		'" . $db->conn->real_escape_string($this->m_sAddress) . "', 
	            		'" . $db->conn->real_escape_string($this->m_sZip) . "',
	            		'" . $db->conn->real_escape_string($this->m_sCity) . "',
	            		'" . $db->conn->real_escape_string($this->m_sEmail) . "',
	           			'" . $db->conn->real_escape_string($this->m_sPhone) . "',
	         			'" . $db->conn->real_escape_string($this->m_iUserId) . "'
=======
		            Restaurant_Naam, 
		            Restaurant_Voornaam, 
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
	            		'" . $db->conn->real_escape_string($this->m_sVoorNaam) . "', 
	            		'" . $db->conn->real_escape_string($this->m_sAdres) . "',
	            		'" . $db->conn->real_escape_string($this->m_sPostcode) . "',
	            		'" . $db->conn->real_escape_string($this->m_sGemeente) . "',
	           			'" . $db->conn->real_escape_string($this->m_sWebsite) . "',
	         			'" . $db->conn->real_escape_string($this->m_sEmail) . "',
	            		'" . $db->conn->real_escape_string($this->m_sTelNummer) . "',
	           			'" . $db->conn->real_escape_string($this->m_sGsmNummer) . "',
	           			'" . $db->conn->real_escape_string($this->m_iGebruikerId) . "'
>>>>>>> master
	            		);";
				echo $sql;
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
<<<<<<< HEAD
					WHERE fk_user_id = $id";
=======
					WHERE fk_gebruiker_id = $id";
>>>>>>> master
			
        	$result = $db->conn->query($sql);
        	
        	return $result;
		}

	}

?>