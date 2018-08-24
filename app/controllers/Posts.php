<?php

class Posts extends Controller {
  public function __construct() {
    // echo 'Posts loaded!';
  }

  public function index() {
    $data = [
      'title' => 'Welcome to Posts!'
    ];
    $this->view('posts/index', $data);
  }
}

?>