<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\User;
use App\Models\Task;

class CategoryTest extends TestCase
{

        /** @test */
        public function it_can_create_a_category()
        {
            $user = User::factory()->create();
            $category = Category::create([
                'category_name' => 'Test Category',
                'created_by' => $user->id,
            ]);

            $this->assertDatabaseHas('tblcategories', [
                'category_name' => 'Test Category',
                'created_by' => $user->id,
            ]);
        }

        /** @test */
        public function it_belongs_to_a_user()
        {
            $user = User::factory()->create();
            $category = Category::factory()->create(['category_name' => 'Test Category', 'created_by' => $user->id]);

            $this->assertInstanceOf(User::class, $category->user);
            $this->assertEquals($user->id, $category->user->id);
        }

        
}
