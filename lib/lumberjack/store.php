<?php
namespace Lumberjack;

use \Timber as Timber;

class Store {

	public $types = array(
		"post"  => "Post",
		"image" => "TimberImage",
		"page"  => "Page",
		"menu"  => "Menu",
		"user"  => "User"
	);
	/*
	**
	** API should be....
	**
	** find('post')->
	**
	**
	*/

	public static function find($type = 'post', $query = null) {
		$args = array(
			'post_type' => $type
		);
		$results = Timber::get_posts($query);
		return new Post();


	}

	public function insert()  {}

	public function update()  {}

	public function delete()  {}

}