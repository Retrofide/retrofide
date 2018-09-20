<?php
	class Publisher {

		private $con;
		private $id;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;
		}

		public function getName() {
			$query = mysqli_query($this->con, "SELECT name FROM publishers WHERE id='$this->id'");
			$publisher = mysqli_fetch_array($query);
			return $publisher['name'];
		}
	}

?>