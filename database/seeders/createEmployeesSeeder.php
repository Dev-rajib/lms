<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class createEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employeeSeeder = [
        	[
        		'id'=>1,'name'=>'Tarun saha','email'=>'tarun@gmail.com','phone'=>'9874948775','address'=>'Birati , Kolkata','experience'=>'5 years','photo'=>'','salary'=>'10000','vacation'=>'4 days','city'=>'Kolkata','status'=>1
        	],
        	[
        		'id'=>2,'name'=>'Daula saha','email'=>'daula@gmail.com','phone'=>'9874955775','address'=>'Belgharia , Kolkata','experience'=>'5 years','photo'=>'','salary'=>'10000','vacation'=>'4 days','city'=>'Kolkata','status'=>1
        	],
        ];
        Employee::insert($employeeSeeder);

    }
}
