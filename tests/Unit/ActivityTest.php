<?php

namespace Tests\Unit;

use App\User;
use App\Activity;
use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\RecordsActivity;
use Facades\Tests\Setup\ProjectFactory;

class ActivityTest extends TestCase
{
	use RefreshDatabase;
    /** @test */
    public function it_has_a_user()
    {
    	$user = $this->signIn();

    	$project = ProjectFactory::ownedBy($user)->create();

    	$this->assertEquals($user->id , $project->activity->first()->user->id);
    }
}
