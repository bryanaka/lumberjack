<?php
require_once('./test/test_helper.php');

use \Lumberjack\Store as Store;

class StoreTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
    	$this->allPosts = Store::find();
    	$this->post = Store::find("post", 1);
    }

	public function testFindReturnsPostByDefault() {
		$this->assertInstanceOf("Lumberjack\Post", $this->allPosts);
	}

	public function testFindReturnsPostById() {
		$this->assertEquals($this->post->id, 1);
	}

}