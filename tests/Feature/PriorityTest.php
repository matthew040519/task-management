<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Priority;
use App\Models\User;

class PriorityTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_priority_can_be_created()
    {
        $user = User::factory()->create();

        $priority = Priority::create([
            'priority_name' => 'High',
            'color' => '#FF0000',
            'created_by' => $user->id,
        ]);

        $this->assertDatabaseHas('tblpriorities', [
            'priority_name' => 'High',
            'color' => '#FF0000',
            'created_by' => $user->id,
        ]);
    }

    public function test_priority_belongs_to_user()
    {
        $user = User::factory()->create();

        $priority = Priority::create([
            'priority_name' => 'Medium',
            'color' => '#FFFF00',
            'created_by' => $user->id,
        ]);

        $this->assertInstanceOf(User::class, $priority->user);
        $this->assertEquals($user->id, $priority->user->id);
    }

    public function test_priority_fillable_fields()
    {
        $user = User::factory()->create();

        $priority = Priority::create([
            'priority_name' => 'Low',
            'color' => '#00FF00',
            'created_by' => $user->id,
            'not_fillable' => 'should not be set',
        ]);

        $this->assertEquals('Low', $priority->priority_name);
        $this->assertEquals('#00FF00', $priority->color);
        $this->assertEquals($user->id, $priority->created_by);
        $this->assertFalse(isset($priority->not_fillable));
    }
}
