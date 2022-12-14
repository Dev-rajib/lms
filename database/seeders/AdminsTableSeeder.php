<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * password 123456
     * @return void
     */
    public function run()
    {
        $adminRecords = [
        	['id'=>1,'name'=>'Super Admin','type'=>'superadmin','vendor_id'=>0,'mobile'=>'9874918772','email'=>'admin@gmail.com','password'=>'$2a$10$Vjc4pmKxVmn/J5ENNNyTu.Bz9Q6dHOO/Q0lcF5BzBcCk2pdD3r7Eu','image'=>'','status'=>1],
        ];
        Admin::insert($adminRecords);
    }
}
