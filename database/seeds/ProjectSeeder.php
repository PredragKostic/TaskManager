<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\User;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 20)->create();
        $projects = Project::get();

        foreach ($projects as $project) {
        	$users = User::limit(7)->inRandomOrder()->get();
        	foreach ($users as $user) {
        		$project->users()->attach($user->id);
        	}
        }
    }
}
