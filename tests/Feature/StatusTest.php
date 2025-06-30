<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class StatusTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /** @test */
    public function it_can_create_a_status()
    {
        $user = \App\Models\User::factory()->create();

        $status = \App\Models\Status::create([
            'status_name' => 'In Progress',
            'created_by' => $user->id,
        ]);

        $this->assertDatabaseHas('tblstatus', [
            'status_name' => 'In Progress',
            'created_by' => $user->id,
        ]);
    }

    /** @test */
    public function it_belongs_to_a_user()
    {
        $user = \App\Models\User::factory()->create();

        $status = \App\Models\Status::create([
            'status_name' => 'Completed',
            'created_by' => $user->id,
        ]);

        $this->assertInstanceOf(\App\Models\User::class, $status->user);
        $this->assertEquals($user->id, $status->user->id);
    }

    /** @test */
    public function status_has_fillable_fields()
    {
        $status = new \App\Models\Status();
        $this->assertEquals(['status_name', 'created_by'], $status->getFillable());
    }
}
