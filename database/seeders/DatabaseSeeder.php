<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\District;
use App\Models\Student;
use App\Models\Address;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);

        // Seed districts
        $districts = [
            'Kathmandu', 'Bhaktapur', 'Lalitpur',
            'Pokhara', 'Chitwan', 'Kaski', 'Nawalparasi'
        ];

        foreach ($districts as $district) {
            District::create(['name' => $district]);
        }

        // Create sample student
        $address = Address::create([
            'address_one' => '123 Main Street',
            'city' => 'Kathmandu',
            'district_id' => District::first()->id
        ]);

        Student::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'birth_date' => '2005-05-15',
            'contact_no' => '9841234567',
            'address_id' => $address->id
        ]);
    }
}