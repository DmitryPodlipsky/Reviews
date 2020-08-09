<?
require $_SERVER['DOCUMENT_ROOT'] . '/config/db_config/db_config.php';

class Database
{
	private $db;
	private $host;
	private $user;
	private $pass; 

	function __construct() 
	{
		$this->db = DB;
		$this->host = HOST;
		$this->user = USER;
		$this->pass = PASS;
	}

	public function write($name, $comments)
	{
		$db_connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if ($db_connect->connect_errno)
		{
			return false;
		}
		if (!($stmt = $db_connect->prepare("INSERT INTO comment (name,comments) VALUES (?,?)"))) 
		{
            return false;
        }
        if (!$stmt->bind_param("ss",$name, $comments)) 
        {
            return false;
        }

        if (!($exec = $stmt->execute())) 
        {
            return false;
        }
        $stmt->close();
		$db_connect->close();
		return true;
	}

	public function read()
	{
		$resArray = array();

		$db_connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if ($db_connect->connect_errno)
		{
			return false;
		}
		if ($res = $db_connect->query("SELECT * FROM comment")) 
		{ 
			for ($row_no = $res->num_rows - 1; $row_no >= 0; $row_no--) 
			{
   			 $res->data_seek($row_no);
   			 $row = $res->fetch_assoc();
   			 $resArray[] = $row;
			}

		}
		$db_connect->close();

		return $resArray;
	}
}
?>