<?php

use Illuminate\Database\Seeder;
use App\Models as Database;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['student'],
            ['admin'],
            ['teacher']
        ];
        foreach ($roles as $role) {
            Database\Role::create([
                'name' => $role[0]
            ]);
        }

    }
}
