<?php

use PHPUnit\Framework\TestCase;
use App\Support\Collection;

class CollectionTest extends TestCase
{
    public function test_empty_collection_returns_no_items_if_instantiated()
    {
        $collection = new Collection;

        $this->assertEmpty($collection->get());
    }

    public function test_count_the_number_of_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three', 'four', 'five'
        ]);

        $this->assertEquals(5, $collection->count());
    }

    public function test_items_returned_match_item_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertCount(3, $collection->get());
        $this->assertEquals('one', $collection->get()[0]);
        $this->assertEquals('two', $collection->get()[1]);
        $this->assertEquals('three', $collection->get()[2]);
    }

    public function test_adding_one_item_to_collection_inserts_the_value_at_the_end()
    {
        $collection = new Collection([
            'Janszen', 'Kiel', 'Legaspi'
        ]);

        $collection->add(['Jose']);

        $this->assertEquals('Jose', $collection->get()[3]);
        $this->assertCount(4, $collection->get());
    }

    public function test_getting_the_last_value_of_an_array_using_pop()
    {
        $collection = new Collection([
            'Currents', 'InnerSpeaker', 'The Slow Rush'
        ]);

        $lastValue = $collection->pop();

        $this->assertEquals('The Slow Rush', $lastValue);
    }

    public function test_collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection;

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    public function test_collection_can_be_iterated()
    {
        $collection = new Collection([
            'Five', 'Four', 'Three', 'Two', 'One'
        ]);

        $items = [];

        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(5, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    public function test_collection_can_be_merged_to_other_collection()
    {
        $collection1 = new Collection([1, 2]);
        $collection2 = new Collection([3, 4, 5, 6]);

        $collection1->merge($collection2);

        $this->assertCount(6, $collection1->get());
        $this->assertEquals(6, $collection1->count());
    }

    public function test_returns_json_encoded_items()
    {
        $collection = new Collection([
            'username' => 'KielLegaspi07',
            'gender' => 'Male',
            'career' => 'Web Developer',
            'isEmployed' => true
        ]);

        $this->assertEquals('{"username":"KielLegaspi07","gender":"Male","career":"Web Developer","isEmployed":true}', $collection->toJson());
        $this->assertIsString($collection->toJson());
    }
}