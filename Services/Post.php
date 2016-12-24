<?php
require_once 'Services/User.php';
	class Post{
		private $postID;
		private $userId;
		private $postdate;
		private $img;
		
		public function __construct(User $user){
			$result = $this->getPostInDB($iser)
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
	}