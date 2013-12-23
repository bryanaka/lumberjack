<?php
namespace Lumberjack;

/*
*
* @class Lumberjack\Collection
*
* I don't know if it is more efficent to use array_map with a copy, then create a new
* instance, or if using the iterator would be better...
*
*/
class Collection extends \ArrayObject implements \SplSubject {

	protected $comparator = null;
	protected $autosort = false;
	private   $observers = array("add" => array(), "remove" => array());

	public function setComparator($func) {
		return $this->comparator = $func;
	}

	public function setAutosort($bool) {
		$this->autosort = $bool;
		$this->_sort();
		return $this->autosort;
	}

	public function getLength() {
		return $this->count();
	}

	public function getSize() {
		return $this->count();
	}

	public function push() {
		$newArray = array_merge($this->getArrayCopy(), func_get_args());
		$this->exchangeArray($newArray);
		$this->_sort();
		return $this;
	}

	public function add($obj){
		return $this->push($obj);
	}

	public function pop($amount = 1) {
		$results = array();
		$index = $this->count() - 1;
		while($amount > 0) {
			array_unshift($results, $this->offsetPull($index));
			--$amount;
			--$index;
		}
		$this->_sort();
		return (count($results) > 1 ? $results : $results[0]);
	}

	public function shift($amount = 1) {
		$results = array();
		for($i = 0; $amount > $i; $i++) {
			$results[] = $this->offsetPull($i);
		}
		$this->_sort();
		return (count($results) > 1 ? $results : $results[0]);
	}

	public function unshift() {
		$newArray = array_merge(func_get_args(), $this->getArrayCopy());
		$this->exchangeArray($newArray);
		$this->_sort();
		return $this;
	}

	public function map($func) {
		return new self( $this->_map($func) );
	}

	public function mMap($func) {
		$newArray = $this->_map($func);
		$this->exchangeArray($newArray);
		return $this;
	}

	public function pluck($attribute) {
		return $this->_map( function($val) use (&$attribute) {
			return $val->{$attribute};
		});
	}

	public function reduce($func, $initial = null) {
		return array_reduce($this->getArrayCopy(), $func, $initial);
	}

	public function __get($name) {
    	if (method_exists($this, ($method = "get".ucwords($name) ))) {
      		return $this->$method();
    	}
    	else return;
  	}

  	public function attach(\SplObserver $observer) {

  	}

  	public function detach(\SplObserver $observer) {

  	}

  	public function notify() {

  	}

  	protected function offsetPull($index) {
  		$val = $this->offsetGet($index);
		$this->offsetUnset($index);
		return $val;
  	}

  	protected function _map($func) {
  		return array_map( $func, $this->getArrayCopy() );
  	}

  	protected function _sort() {
  		if($this->autosort && $this->comparator) {
			$this->uasort($this->comparator);
		}
  	}
}