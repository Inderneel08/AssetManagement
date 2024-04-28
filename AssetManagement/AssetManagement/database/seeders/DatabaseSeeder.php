<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            // \App\Models\Asset::factory(50)->create();
            

            // \App\Models\User::factory(1)->create();    

            // \App\Models\Asset::factory(50)->create();

            // \App\Models\Issue::factory(30)->create();


            $users = [
                
                // [
                //     'username'=>'Bhupinder Garg',
                //     'email' => 'bhupinder.garg@hal-india.co.in',
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'ADMIN',
                //     'status' => 1,
                //     'designation' => 'Sr. Manager',
                // ],

                // [
                //     'username'=>'Inderneel Minhas',
                //     'email' => 'inderneel.minhas@gmail.com',
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'ADMIN',
                //     'status' => 1,
                //     'designation' => 'INTERN',
                // ],

                // [
                //     'username'=>'Preetam',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

                // [
                //     'username'=>'Anil Singh',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Manager',
                // ],

                // [
                //     'username'=>'Gaurav Kumar Joshi',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'ADMIN',
                //     'status' => 1,
                //     'designation' => 'Joint Director',
                // ],

                // [
                //     'username'=>'Anita Pandita',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Finance',
                // ],

                // [
                //     'username'=>'Sushant',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

                // [
                //     'username'=>'Niranjan Pandey',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'System Admin',
                // ],

                // [
                //     'username'=>'Prashant Sexsana',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Manager',
                // ],

                // [
                //     'username'=>'Gopal',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

                // [
                //     'username'=>'Accounts',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Accounts',
                // ],

                // [
                //     'username'=>'Pooja',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'HelpDesk',
                // ],

                // [
                //     'username'=>'Dinesh',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'VC Support',
                // ],

                // [
                //     'username'=>'Share Folder',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Share Folder',
                // ],

                // [
                //     'username'=>'VC Room',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Unknown',
                // ],

                // [
                //     'username'=>'Sumit Kumar',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'UDC',
                // ],

                // [
                //     'username'=>'Sugandha',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Software Developer',
                // ],

                // [
                //     'username'=>'Ritesh Rai',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

                // [
                //     'username'=>'Rakhi',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Unknown',
                // ],

                // [
                //     'username'=>'Geetanjali',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Social Media',
                // ],

                // [
                //     'username'=>'Jyoti',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Unknown',
                // ],

                // [
                //     'username'=>'Deepak Kumar',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'HelpDesk',
                // ],

                // [
                //     'username'=>'Deepak Jha',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Solution Architect',
                // ],

                // [
                //     'username'=>'Pratibha yadav',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Android Developer',
                // ],

                // [
                //     'username'=>'CEO-DPIT',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'ADMIN',
                //     'status' => 1,
                //     'designation' => 'CEO-DPIT',
                // ],

                // [
                //     'username'=>'Swati Kumari',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

                // [
                //     'username'=>'Piyush',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Social Media',
                // ],

                // [
                //     'username'=>'Ravee',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

                // [
                //     'username'=>'Jai Kaushik',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Solution Architect',
                // ],

                // [
                //     'username'=>'Amit Kumar',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'ADMIN',
                //     'status' => 1,
                //     'designation' => 'Sr.Manager',
                // ],

                // [
                //     'username'=>'Manisha',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

                // [
                //     'username'=>'Meenakashi',
                //     'email' => Faker::create()->email,
                //     'password' =>bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'UI Designer',
                // ],

                // [
                //     'username'=>'Dileep Singh',
                //     'email'=> Faker::create()->email,
                //     'password' => bcrypt('62009187mY@1234'),
                //     'role' => 'USER',
                //     'status' => 1,
                //     'designation' => 'Developer',
                // ],

            ];

            // DB::table('users')->insert($users);

            $assets = [

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/01',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.135',
                //     'mac_id'=>'F4-39-09-3A-09-70',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/02',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.55',
                //     'mac_id'=>'39-09-3A-DD-A2',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/03',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.50',
                //     'mac_id'=>'F4-39-09-3D-12-FB',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/04',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.128',
                //     'mac_id'=>'F4-39-09-3D-13-31',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/05',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.54',
                //     'mac_id'=>'F4-39-09-3A-07-74',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/06',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.64',
                //     'mac_id'=>'F4-39-09-3A-09-66',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/07',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.59',
                //     'mac_id'=>'F4-39-09-3D-17-00',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/08',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.56',
                //     'mac_id'=>'C4-65-16-12-AA-67',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/09',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.141',
                //     'mac_id'=>'C4-65-16-2D-8A',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/10',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>'C4-65-16-30-A5',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/11',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>'C4-65-16-15-80-2A',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/12',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.136',
                //     'mac_id'=>'00-E0-4C-30-39-CD',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/13',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>'00-E0-4C-00-2F-A4',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/14',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.123',
                //     'mac_id'=>'00-E0-4C-30-3E-DF',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/15',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.136',
                //     'mac_id'=>'00-E0-4C-30-3D-21',
                // ],

                // // [
                // //     'asset_id'=> 'HAL/DPIT/2019/40/16',
                // //     'asset_type'=>'Desktop',
                // //     'ip'=>'192.168.1.52',
                // //     'mac_id'=>'00-E0-4C-30-3F-FD',
                // // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/17',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.132',
                //     'mac_id'=>'00-E0-4C-30-3D-A2',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/18',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.143',
                //     'mac_id'=>'00-E0-4C-30-3E-75',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/19',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>'00-E0-4C-30-3F-CO',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/20',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>'00-E0-4C-30-3F-D3',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/21',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.137',
                //     'mac_id'=>'00-E0-4C-30-3E-DC',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/22',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.134',
                //     'mac_id'=>'00-E0-4C-0E-4F-CF',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/23',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.67',
                //     'mac_id'=>'00-E0-4C-0E-52-7A',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/24',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>null,
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/25',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'10.10.1.11',
                //     'mac_id'=>'00-E0-4C-OE-4D-08',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/26',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.245',
                //     'mac_id'=>'00-E0-4C-OE-52-3D',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/27',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.150',
                //     'mac_id'=>'00-E0-4C-OE-58-6C',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/28',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>'00-E0-4C-OE-58-E9',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/29',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>'00-E0-4C-OE-4E-C5',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/30',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.145',
                //     'mac_id'=>'50-81-40-95-C5-FD',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/31',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.148',
                //     'mac_id'=>'50-81-40-95-C4-2A',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/32',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.89',
                //     'mac_id'=>'50-81-40-95-BC-0E',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/33',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>null,
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/34',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.109',
                //     'mac_id'=>'50:81:40-95-BD-07',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/35',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.76',
                //     'mac_id'=>'50-81-40-95-C4-E8',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/36',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.209',
                //     'mac_id'=>'50:81:40:95:BC:13',
                // ],

                // // [
                // //     'asset_id'=> 'HAL/DPIT/2019/40/37',
                // //     'asset_type'=>'Desktop',
                // //     'ip'=>'192.168.1.52',
                // //     'mac_id'=>'00-E0-4C-30-3F-FD',
                // // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/38',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.62',
                //     'mac_id'=>'5C-60-BA-A2-CD-2A',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/39',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.71',
                //     'mac_id'=>'5C-60BA-C2-68-4C',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/40',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.96',
                //     'mac_id'=>'5C-60-BA-A2-5D-2B',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/41',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.90',
                //     'mac_id'=>'5C-60-BA-A2-5D-A7',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/42',
                //     'asset_type'=>'Desktop',
                //     'ip'=>'192.168.1.1',
                //     'mac_id'=>'5C-60-BA-C2-68-4C',
                // ],

                // [
                //     'asset_id'=> 'HAL/DPIT/2019/40/43',
                //     'asset_type'=>'Desktop',
                //     'ip'=>null,
                //     'mac_id'=>null,
                // ],
                
                // [
                //     'asset_id' => 'AS-1113-29-3215',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 0',
                //     'status' => 0,
                // ],

                // [
                //     'asset_id' => 'SY341J8000052',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 1',
                //     'status' => 1,
                //     'port' => 24,
                // ],

                // [
                //     'asset_id' => 'QS5P217001268',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 2',
                //     'status' => 1,
                //     'port' => 16,
                // ],

                // [
                //     'asset_id' => 'QS5P20C004245',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 3',
                //     'status' => 1,
                //     'port' => 16,
                // ],

                // [
                //     'asset_id' => 'S30Q2I5004752',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 4',
                //     'status' => 1,
                //     'port' => 24,
                // ],

                // [
                //     'asset_id' => 'QS7L2I3014045',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 5',
                //     'status' => 1,
                //     'port' => 8,
                // ],

                // [
                //     'asset_id' => 'QS7L2I3014044',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 6',
                //     'status' => 1,
                //     'port' => 8,
                // ],

                // [
                //     'asset_id' => 'QS7L2I3014045',
                //     'asset_type' => 'Switch',
                //     'asset_name' => 'D-Link Switch 6',
                //     'status' => 1,
                //     'port' => 8,
                // ],

                // [
                //     'asset_id' => 'AG8P2F-001',
                //     'asset_type' => 'Firewall',
                //     'asset_name' => 'HAL/DPIT/Firewall/46/2020/01',
                //     'status' => 1,
                // ],
                
                [
                    'asset_id' => 'HAL/DPIT/2019/229/01',
                    'asset_type' => 'Printer',
                ],
                
                [
                    'asset_id' => 'HAL/DPIT/2019/229/02',
                    'asset_type' => 'Printer',
                ],

                [
                    'asset_id' => 'HAL/DPIT/2019/229/03',
                    'asset_type' => 'Printer',
                ],

                [
                    'asset_id' => 'HAL/DPIT/2023/229/01',
                    'asset_type' => 'Printer',
                ],

                [
                    'asset_id' => 'HAL/DPIT/2023/229/02',
                    'asset_type' => 'Printer',
                ],

                [
                    'asset_id' => 'HAL/DPIT/2023/229/03',
                    'asset_type' => 'Printer',
                ],


                // [
                //     'asset_id' => 'HAL/DPIT/2019/229/04',
                //     'asset_type' => 'Printer',
                // ],
            ];

            DB::table('assets')->insert($assets);
    }
}
