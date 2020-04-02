<?php

use Illuminate\Database\Seeder;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_statuses')->insert([
            ['name' => 'planning', 'description' => 'Project is in planning phase', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'development', 'description' => 'Project is in development phase', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'maintenance', 'description' => 'Project is in maintenance phase', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'on hold', 'description' => 'Project is on hold', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'archived', 'description' => 'Project is archived', 'created_at' => \Carbon\Carbon::now()],
            ['name' => 'closed', 'description' => 'Project is closed or done', 'created_at' => \Carbon\Carbon::now()],
        ]);
    }
}
