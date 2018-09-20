<?php
	class Console {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getName() {
			$consoleQuery = mysqli_query($this->con, "SELECT name FROM consoles WHERE id='$this->id'");
			$console = mysqli_fetch_array($consoleQuery);
			return $console['name'];
		}
	}

?>