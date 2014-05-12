<?php

	include_once 'Db.class.php';

	class Reservatie
	//extends Restaurant
	{
		private  $m_sDatum;
		private  $m_iPersonen;
		private  $m_iTijd;
		private  $m_sNaam;
		private  $m_iTelnr;
		private  $m_sEmail;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'Datum':
					$this->m_sDatum = $p_vValue;
					break;

				case 'Personen':
					$this->m_iPersonen = $p_vValue;
					break;

				case 'Tijd':
					$this->m_iTijd = $p_vValue;
					break;

				case 'Naam':
					$this->m_sNaam = $p_vValue;
					break;

				case 'Telefoon':
					$this->m_iTelnr = $p_vValue;
					break;

				case 'Email':
					$this->m_sEmail = $p_vValue;
					break;

				default:
					break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) 
			{
				case 'Datum':
					return $this->m_sDatum;
					break;

				case 'Personen':
					return $this->m_iPersonen;
					break;

				case 'Tijd':
					return $this->m_iTijd;
					break;

				case 'Naam':
					return $this->m_sNaam;
					break;

				case 'Telefoon':
					return $this->m_iTelnr;
					break;

				case 'Email':
					return $this->m_sEmail;
					break;
				
				default:
					break;
			}
		}


		public function Save()
		{
            $db = new Db();

            $sql = "insert into tblreservaties 

			            (Reservatie_Datum, 
			             Reservatie_Personen, 
			             Reservatie_Uur,
			             Reservatie_Naam,
			             Reservatie_Telnr,
			             Reservatie_Email)

            	values 
            	   ('" . $db->conn->real_escape_string($this->m_sDatum) ."', 
            		'" . $db->conn->real_escape_string($this->m_iPersonen) . "', 
            		'" . $db->conn->real_escape_string($this->m_iTijd) . "',
					'" . $db->conn->real_escape_string($this->m_sNaam) ."', 
            		'" . $db->conn->real_escape_string($this->m_iTelnr) . "', 
            		'" . $db->conn->real_escape_string($this->m_sEmail) . "');
			"; 
            $db->conn->query($sql);
		}

		public function getAll()
		{
		    $db = new Db();
        	$sql = "select * from tblreservaties";
        	$result = $db->conn->query($sql);
        	return $result;
		}

	}

?>