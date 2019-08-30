<?php

namespace Tests\Feature\Models;

use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryFeatureTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
        /** @var Category $category */
        $category = factory(Category::class)->create();
        $this->assertCount(1, Category::all());
        $fields = array_keys($category->getAttributes());
        $this->assertEqualsCanonicalizing([
            'id',
            'name',
            'description',
            'created_at',
            'updated_at'
        ], $fields);
    }

    public function testCreate(){
        $category = Category::create([
            'name' => 'test'
        ]);

        $this->assertDatabaseHas('categories', [
            'name' => 'test',
            'description' => null
        ]);

        $this->assertEquals('test', $category->name);
    }

    public function testDelete(){
        $category = factory(Category::class)->create();
        $category->delete();
        $this->assertNull(Category::find($category->id));
    }


}
