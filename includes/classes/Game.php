<?php
	class Game {

		private $con;
		private $id;
		private $title;
		private $consoleId;
		private $publisherId;
		private $artworkPath;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM games WHERE id='$this->id'");
			$game = mysqli_fetch_array($query);

			$this->title = $game['title'];
			$this->consoleId = $game['console'];
			$this->publisherId = $game['publisher'];
			$this->artworkPath = $game['artworkPath'];
		}

		public function getTitle() {
			return $this->title;
		}

		public function getConsole() {
			return new Console($this->con, $this->consoleId);
		}

		public function getPublisher() {
			return new Publisher($this->con, $this->publisherId);
		}

		public function getArtworkPath() {
			return $this->artworkPath;
		}

		public function getNumberOfSongs() {
			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE game='$this->id'");
			return mysqli_num_rows($query);
		}
		public function getSongIds() {

			$query = mysqli_query($this->con, "SELECT id FROM songs WHERE game='$this->id'");

			$array = array();

				while($row = mysqli_fetch_array($query)) {
					array_push($array, $row['id']);
				}
				return $array;
		}
	}

?>