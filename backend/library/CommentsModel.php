<?php

class CommentsModel{
	public $id, $post_id, $title, $body, $author, $time;

	public function __construct($id = NULL, $post_id = NULL, $title = NULL, $body = NULL, $author = NULL, $time = NULL){
		$this->id = $id;
		$this->post_id = $post_id;
		$this->title = $title;
		$this->body = $body;
		$this->author = $author;
		$this->time = $time;
		
	}

	public function __get($property) {
		if (property_exists($this, $property)) {return $this->$property;  }
	}
	
	
}

?>