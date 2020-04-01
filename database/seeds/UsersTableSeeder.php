<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    private $createDemoUser= true;
    private $demoUser = [
        'name' => 'Demo User',
        'email' => 'demo@elixir.com',
        'role' => 1,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        // Creating demo user
        if($this->createDemoUser){
           User::create($this->demoUser);
            $this->createDemoUser = false;
        }
        // done creating demo user

        factory(User::class, 10)->create();

        DB::commit();
    }
}
