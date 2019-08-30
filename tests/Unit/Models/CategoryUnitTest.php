<?php

namespace Tests\Unit\Models;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFillable()
    {
        $fillable = ['name', 'description', 'is_active'];
        $this->assertEquals($fillable, (new Category())->getFillable());
    }

    public function testDates()
    {
        $dates = ['field', 'created_at', 'updated_at'];
        $this->assertEquals($dates, (new Category())->getDates());
    }
}
