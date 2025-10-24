<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 random registrations with various statuses
        Registration::factory(50)->create();

        // Create some specific registrations for testing
        Registration::factory(5)->validated()->create();
        Registration::factory(3)->pending()->priority()->create();
        Registration::factory(2)->incomplete()->create();
        Registration::factory(1)->cancelled()->create();
    }
}
