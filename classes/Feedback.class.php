<?php

	//include_once 'Db.class.php';

	class Feedback
	{
		private  $m_sComment;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) 
			{
				case 'Comment':
					$this->m_sComment = $p_vValue;
					break;

				default:
					break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) 
			{

				case 'Comment':
					return $this->m_sComment;
					break;
				
				default:
					break;
			}
		}


		public function Save()
		{
            $db = new Db();

            $sql = "insert into tblfeedback (Feedback_Feedback)
            		values 
            		('" . $db->conn->real_escape_string($this->m_sComment) . "');
			"; 
            $db->conn->query($sql);
		}

		public function getAll()
		{
		    $db = new Db();
        	$sql = "select * from tblfeedback";
        	$result = $db->conn->query($sql);
        	return $result;
		}

	}

?>