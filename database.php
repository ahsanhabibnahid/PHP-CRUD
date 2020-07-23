<?php
	/**Database Class**/
	class Database{
		
		public $host = "localhost";
		public $user = "root";
		public $password = "";
		public $dbname = "my_crud"; 
		public $link;

		public function __construct(){
			$this->connection();
		}

		/**Database Connection**/

		public function connection(){
			$this->link = new mysqli($this->host, $this->user, $this->password, $this->dbname);
			if ($this->link->connect_error) {
				die("Connection Failed".$this->link->connect_error);
			}
		}

		/**Select Data**/

		public function select($getSql){
			$result = $this->link->query($getSql);
			if ($result->num_rows > 0) {
				return $result;
			}
			else {
				return false;
			}
		}

		/**Select Data**/

		public function insert($getSql){
			$result = $this->link->query($getSql) or die("insert error".$this->link->errno.__LINE__);
			if ($result) {
				header("Location: index.php?msg=".urlencode("<h3 class='text-success text-center'>Data Insert Successfully</h3>"));
			}
			else{
				die("error".$this->link->errno);
			}
		}

		/**Update Data**/

		public function update($getSql){
			$result = $this->link->query($getSql) or die("insert error".$this->link->errno.__LINE__);
			if ($result) {
				header("Location: index.php?msg=".urlencode("<h3 class='text-success text-center'>Data Update Successfully</h3>"));
			}
			else{
				die("error".$this->link->errno);
			}
		}

		/**Delete Data**/

		public function delete($getSql){
			$result = $this->link->query($getSql) or die("insert error".$this->link->errno.__LINE__);
			if ($result) {
				header("Location: index.php?msg=".urlencode("<h3 class='text-success text-center'>Data Delete Successfully</h3>"));
			}
			else{
				die("error".$this->link->errno);
			}
		}
	}
?>