<?
require_once $_SERVER['DOCUMENT_ROOT'] .  '/class/db/Database.php';

class Review
{
	private $database;
	private $storage;

	function __construct()
	{
		$this->database = new Database();
		$this->storage = $this->init();

	} 

	private function init()
	{
		$result = $this->database->read();

		if (is_array($result)) 
		{
			return $result;
		}
		else 
		{
			return array();
		}

	} 

	public function writeReview($name,$comments)
	{
		$result = false;

		if ($this->database->write($name,$comments))
		{
			$this->storage = $this->init();
			$result = true;
		}
		return $result;
	}

	public function getReviews()
	{
		return $this->storage;
	} 

}


?>