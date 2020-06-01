<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;

class InvitationsTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_project_can_invite_a_user()
    {
         $project = ProjectFactory::create();
        
         $project->invite($newUser = factory(User::class)->create());

         $this->signIn($newUser);

         $this->post(action('ProjectTasksController@store', $project), $task = ['body' => 'Foo Task']);

         $this->assertDatabaseHas('tasks', $task);
    }


}
