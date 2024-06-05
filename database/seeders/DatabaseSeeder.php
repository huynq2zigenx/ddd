<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Recruit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
        ]);
        $user2 = User::factory()->create([
            'name' => 'test2',
            'email' => 'test2@example.com',
        ]);

        Contact::factory()->for($user1, 'owner')->create();
        Contact::factory()->for($user2, 'owner')->create();

        $company1 = Company::factory()->for($user1, 'owner')->create();
        $company2 = Company::factory()->for($user2, 'owner')->create();

        Recruit::factory()->for($company1, 'company')->count(10)->create();
        Recruit::factory()->for($company2, 'company')->count(10)->create();
    }
}
