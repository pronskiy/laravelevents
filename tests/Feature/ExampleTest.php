<?php

namespace Tests\Feature;

use App\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $item = factory(Item::class)->create();

        $item = factory_create(Item::class);
        $item->
    }


}

function factory_create($class)
{
    return factory(Item::class)->create();
}
