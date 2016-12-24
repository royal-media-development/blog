<?php
require_once 'Services/User.php';
	class Post{
		private $postID;
		private $userId;
		private $postdate;
		private $img;
		
		public function __construct($postID){
			$result = $this->getPostInDB();
			if($result) {
				$this->setPostID($result["id"]);
				$this->setUserID($result["post"]);
				$this->setPostDate($result["user"]);
				$this->setImg($result["value"]);
			}
		}
			
		public function getPostID(){
			return $this -> postsID;
		}
		
		public function setPostID($postID){
			$this->postID = $postID;
		}
		
		public function getUserID(){
			return $this->userId;
		}
		
		public function setUserID($userID){
			$this->content=$userID;
		}
		
		public function getPostDate(){
			return $this->postdate;
		}
		
		public function setPostDate($postDate){
			$this->postdate=$postDate;
		}
		
		public function getImg(){
			return $this->img;
		}
		
		public function setImg($img){
			$this->img=$img;
		}
		
		private function getPostInDB(){
			try{
				include '/../config.php';
				$conn = new PDO("mysql:host=$HOST;dbname=$DBNAME , $DBCONTENT , $DBCONTENTTIME , $DBUSERID , $DBPOSTID");
				$conn ->setAttribute(PDO :: ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
				$stmt = $conn ->prepare("SELECT * FROM POST WHERE postID = $postID");
				$stmt ->execute();
				$result = $stmt->fetch();
			}catch(PDOException $e){
				$result =$e;
			}
			$conn = null;
		
			return $result;
		}
		
	}