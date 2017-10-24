<?php 

/**
* 
*/
class CollectionTest extends \PHPUnit\Framework\TestCase
{

	/** @test */
	public function empty_instantiated_collection_return_no_item(){
		$collection = new \User\Support\Collection;

		$this->assertEmpty($collection->get());
	}

	public function test_collection_items_count_is_correct(){
		$collection = new \User\Support\Collection([
			'one', 'two', 'three'
		]);

		$this->assertEquals(3, $collection->count());
	}

	public function test_collection_items_is_match(){
		$collection = new \User\Support\Collection([
			'one', 'two', 'three'
		]);

		$this->assertCount(3, $collection->get());
		$this->assertEquals($collection->get()[0],'one');
		$this->assertEquals($collection->get()[1],'two');
		$this->assertEquals($collection->get()[2],'three');
	}

	public function test_collection_is_instance_of_iterator_aggregate(){
		$collection = new \User\Support\Collection;

		$this->assertInstanceOf(IteratorAggregate::class, $collection);
	}

	public function test_collection_can_be_iterated(){
		$collection = new \User\Support\Collection([
			'one', 'two', 'three'
		]);

		$item = [];

		foreach ($collection as $item) {
			$items[] = $item;
		}

		$this->assertCount(3, $items);
		$this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
	}

	public function test_collection_can_be_merged(){
		$collection1 = new User\Support\Collection(['one', 'two']);
		$collection2 = new User\Support\Collection(['three', 'four', 'five']);

		$collection1->merge($collection2);

		$this->assertCount(5, $collection1->get());
		$this->assertEquals(5, $collection1->count());
	}

	public function test_add_to_existing_collection(){
		$collection = new \User\Support\Collection(['one', 'two']);
		$collection->add(['three']);

		$this->assertEquals(3, $collection->count());
		$this->assertCount(3, $collection->get());
	}

	public function test_return_json_endcoded_items(){
		$collection = new \User\Support\Collection([
			['username' => 'alex'],
			['username' => 'billy'],
		]);

		$this->assertInternalType('string', $collection->toJson());
		$this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
	}

	public function test_encoding_a_collection_object_returns_json(){
		$collection = new \User\Support\Collection([
			['username' => 'alex'],
			['username' => 'billy'],
		]);

		$encoded = json_encode($collection);

		$this->assertInternalType('string', $encoded);
		$this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $encoded);
	}

}

?>