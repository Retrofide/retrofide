<?php
	class Song {

		private $con;
		private $id;
		private $mysqliData;
		private $title;
		private $artistId;
		private $gameId;
		private $consoleId;
		private $style;
		private $duration;
		private $path;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
			$this->mysqliData = mysqli_fetch_array($query);
			$this->title = $this->mysqliData['title'];
			$this->artistId = $this->mysqliData['artist'];
			$this->gameId = $this->mysqliData['game'];
			$this->consoleId = $this->mysqliData['console'];
			$this->style = $this->mysqliData['style'];
			$this->duration = $this->mysqliData['duration'];
			$this->path = $this->mysqliData['path'];
		}

		public function getTitle() {
			return $this->title;
		}

		public function getId() {
			return $this->id;
		}

		public function getArtist() {
			return new Artist($this->con, $this->artistId);
		}
		public function getGame() {
			return new Game($this->con, $this->gameId);
		}
		public function getConsole() {
			return new Console($this->con, $this->consoleId);
		}
		public function getStyle() {
			return $this->style;
		}
		public function getDuration() {
			return $this->duration;
		}
		public function getPath() {
			return $this->path;
		}

		public function getMysqliData() {
			return $this->mysqliData;
		}

	}

?>