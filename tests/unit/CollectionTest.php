<?php 

/**
* 
*/
class CollectionTest extends \PHPUnit\Framework\TestCase
{

	/** @test */
	public function empty_instantiated_collection_return_no_item(){
		$collection = new \App\Support\Collection;

		$this->assertEmpty($collection->get());
	}

	public function test_collection_items_count_is_correct(){
		$collection = new \App\Support\Collection([
			'one', 'two', 'three'
		]);

		$this->assertEquals(3, $collection->count());
	}

	public function test_collection_items_is_match(){
		$collection = new \App\Support\Collection([
			'one', 'two', 'three'
		]);

		$this->assertCount(3, $collection->get());
		$this->assertEquals($collection->get()[0],'one');
		$this->assertEquals($collection->get()[1],'two');
		$this->assertEquals($collection->get()[2],'three');
	}

}

?>