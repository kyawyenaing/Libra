<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'ccdadmin@gmail.com',
            'password' => bcrypt('ccdadmin'),
            'age' => 25,
            'address' => 'Yangon',
            'phone_no' => '09987654321',
            'is_admin' => true,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
                            'name'=>'member',
                            'email'=>'memeber@gmail.com',
                            'password'=>bcrypt('memeber'),
                            'age'=>20,
                            'address'=>'Mandalay',
                            'phone_no'=>'09123456789',
                            'is_admin' =>false,
                            'created_at' =>date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                            ]);
    }
}
