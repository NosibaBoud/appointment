<?php

namespace Database\Seeders;

use App\Models\department;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
        public function run(): void
        {
            $this->tests();
            $this->call(AdminUserSeeder::class);
        }


        private function tests ()
        {
            $tests=[
                [
                    'name'                  => 'Blood Test',
                    'details'               => 'General blood work to check overall health.',
                    'price'                 => 100.00,
                    'expected_time_for_test'=> '30 minutes',
                    'instructions'          => 'Fasting for 8 hours prior to test.',
                    'status'                => 'active',
                ],
                [
                    'name'                  => 'X-ray',
                    'details'               => 'Radiography to check bone structure.',
                    'price'                 => 200.00,
                    'expected_time_for_test'=> '45 minutes',
                    'instructions'          => 'No special preparation required.',
                    'status'                => 'active',
                ],
                [
                    'name'                  => 'MRI Scan',
                    'details'               => 'Magnetic Resonance Imaging for detailed internal imaging.',
                    'price'                 => 1500.00,
                    'expected_time_for_test'=> '60 minutes',
                    'instructions'          => 'Remove any metallic objects prior to the scan.',
                    'status'                => 'active',
                ],
                [
                    'name'                  => 'Ultrasound',
                    'details'               => 'Ultrasound scan for internal organ checkup.',
                    'price'                 => 300.00,
                    'expected_time_for_test'=> '40 minutes',
                    'instructions'          => 'Drink water before the procedure.',
                    'status'                => 'active',
                ],
                [
                    'name'                  => 'CT Scan',
                    'details'               => 'Computed Tomography scan for in-depth imaging.',
                    'price'                 => 1200.00,
                    'expected_time_for_test'=> '90 minutes',
                    'instructions'          => 'Avoid eating for 4 hours before the scan.',
                    'status'                => 'active',
                ],
            ];
        }
    }
