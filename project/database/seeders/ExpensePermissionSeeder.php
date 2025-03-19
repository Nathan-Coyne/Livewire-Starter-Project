<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExpensePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions if they don't exist
        $submitPermission = Permission::firstOrCreate([
            'name' => 'submit_expense',
            'description' => 'Allows submitting expenses'
        ]);

        $approvePermission = Permission::firstOrCreate([
            'name' => 'approve_expense',
            'description' => 'Allows approving expenses'
        ]);

        // Create a test platform
        $platform = Platform::firstOrCreate(['name' => 'Test Platform']);

        // Create test users
        $submitter = User::factory()->create(['name' => 'Login', 'email' => 'test@example.com', 'password' => bcrypt('password')]);
        $approver = User::factory()->create(['name' => 'Admin Login', 'email' => 'test_admin@example.com', 'password' => bcrypt('password')]);

        // Grant permissions
        $submitter->grantedPermissions()->attach($submitPermission->id, [
            'granter_id' => $platform->id,
            'granter_type' => Platform::class,
            'grantee_id' => $submitter->id,
            'grantee_type' => User::class
        ]);

        $approver->grantedPermissions()->attach($approvePermission->id, [
            'granter_id' => $platform->id,
            'granter_type' => Platform::class,
            'grantee_id' => $approver->id,
            'grantee_type' => User::class
        ]);

        $this->command->info('Expense permissions seeded successfully!');
    }
}
