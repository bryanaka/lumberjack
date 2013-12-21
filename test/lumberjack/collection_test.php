<?php
/**
 * @coversDefaultClass \Lumberjack\Collection
 */

require_once('./test/test_helper.php');
use Lumberjack\Collection as Collection;

class Person {
	public $name;
	public $greeting;

	public function __construct($name, $greeting) {
		$this->name = $name;
		$this->greeting = $greeting;
	}
}

class CollectionTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
		$this->collection = new Collection;
		$this->greetings  = new Collection(array("hey", "man", "what", "up"));
		$this->people = new Collection( array(
											new Person("Walter", "I am the danger."),
											new Person("Jesse",  "Yeah, Science!"),
											new Person("Skylar", "Walter?")
										));
	}

	/**
     * @covers ::getLength
     */
	public function testLength() {
		$this->assertEquals($this->collection->length, 0);
		$this->collection->append("hey");
		$this->assertEquals($this->collection->length, 1);
	}

	/**
	 * @covers ::setComparator
	 */
	public function testSetComparator() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::setAutosort
	 */
	public function testSetAutosort() {
		$this->assertTrue($this->collection->setAutosort(true));
		$this->assertFalse($this->collection->setAutosort(false));
	}

	/**
	 * @covers ::add
	 */
	public function testAdd() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::remove
	 */
	public function testRemove() {
		$this->markTestSkipped();
	}

	/**
     * @covers ::push
     */
	public function testPush() {
		$this->collection->push("hey");
		$this->assertEquals($this->collection[0], "hey");
	}

	/**
	 * @covers ::push
     * @depends testPush
     */
	public function testPushMultiple() {
		$this->collection->push("hey", "man", "what", "is", "up");
		$this->assertEquals($this->collection[2], "what");
		$this->assertEquals($this->collection[3], "is");
	}

	/**
	 * @covers ::push
     * @depends testPush
     */
	public function testPushReturnsSelf() {
		$collection = $this->collection->push("hey", "man");
		$this->assertEquals($this->collection, $collection);
	}

	/**
     * @covers ::pop
     */
	public function testPop() {
		$val = $this->greetings->pop();
		$this->assertEquals("up", $val);
	}

	/**
	 * @covers ::pop
     * @depends testPop
     */
	public function testPopMultiple() {
		$val = $this->greetings->pop(2);
		$this->assertEquals(array("what", "up"), $val);
	}

	/**
     * @covers ::shift
     */
	public function testShift() {
		$val = $this->greetings->shift();
		$this->assertEquals("hey", $val);
	}

	/**
	 * @covers ::shift
     * @depends testShift
     */
	public function testShiftMultiple() {
		$val = $this->greetings->shift(2);
		$this->assertEquals(array("hey", "man"), $val);
	}

	/**
     * @covers ::unshift
     */
	public function testUnshift() {
		$this->greetings->unshift("yo yo yo");
		$this->assertEquals("yo yo yo", $this->greetings[0]);
	}

	/**
	 * @covers ::unshift
     * @depends testUnshift
     */
	public function testUnshiftMultiple() {
		$this->collection->unshift("hey", "man", "what", "is", "up");
		$this->assertEquals($this->collection[2], "what");
		$this->assertEquals($this->collection[3], "is");
	}

	/**
	 * @covers ::unshift
     * @depends testUnshift
     */
	public function testUnshiftReturnsSelf() {
		$greetings = $this->greetings->unshift("yo yo yo");
		$this->assertEquals($this->greetings, $greetings);
	}

	/**
     * @covers ::map
    */
	public function testMap() {
		$mapped = $this->greetings->map(function($val) {
			return $val." bro";
		});
		$this->assertEquals("hey bro", $mapped[0]);
		$this->assertEquals("man bro", $mapped[1]);
	}

	/**
     * @covers ::mMap
    */
	public function testMMap() {
		$this->greetings->mMap(function($val) {
			return $val." bro";
		});
		$this->assertEquals("hey bro", $this->greetings[0]);
		$this->assertEquals("man bro", $this->greetings[1]);
	}

	/**
	 * @covers ::reduce
	 */
	public function testReduce() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::pluck
	 * @depends testMap
	 */
	public function testPluck() {
		$names = $this->people->pluck("name");
		$greetings = $this->people->pluck("greeting");

		$this->assertContains("Walter", $names);
		$this->assertContains("Jesse",  $names);
		$this->assertContains("Skylar", $names);
		$this->assertEquals(array("I am the danger.", "Yeah, Science!", "Walter?"), $greetings);
	}

	/**
	 * @covers ::shuffle
	 */
	public function testShuffle() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::slice
	 */
	public function testSlice() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::mSlice
	 */
	public function testMSlice() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::where
	 */
	public function testWhere() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::findWhere
	 */
	public function testFindWhere() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::filter
	 */
	public function testFilter() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::reject
	 */
	public function testReject() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::mReject
	 */
	public function testMReject() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::unique
	 */
	public function testUnique() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::mUnique
	 */
	public function testMUnique() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::sample
	 */
	public function testSample() {
		$this->markTestSkipped();
	}

	/**
	 * @covers ::toJSON
	 */
	public function testToJSON() {
		$this->markTestSkipped();
	}





}