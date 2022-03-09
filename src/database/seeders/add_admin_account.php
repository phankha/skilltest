<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class add_admin_account extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(Admin::TABLE)->insert([
            'name' => 'Kha Phan',
            'email' => 'admin@skilltest.co',
            'password' => Hash::make('KhaPhan!@@#2022')
        ]);
    }
}
