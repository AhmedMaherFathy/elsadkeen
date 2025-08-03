<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define your permissions
        $permissionsToCreate = [
            'view users',
            'create users',
            'edit users',
            'delete users',

            'view roles', // Even if not using roles for assignment, you might still view them
            'create roles',
            'edit roles',
            'delete roles',

            'view permissions',
            'assign permissions',
            'view dashboard', // Essential for dashboard access
            'manage settings',
            'access reports',
            // Add any other permissions specific to your admin dashboard
        ];

        // Create permissions, explicitly assigning them to the 'admin' guard
        // This is crucial for guard consistency
        foreach ($permissionsToCreate as $permissionName) {
            Permission::firstOrCreate(
                ['name' => $permissionName, 'guard_name' => 'admin'] // <-- IMPORTANT: Specify 'admin' guard
            );
        }

        // --- Create or find the admin user ---
        $adminEmail = 'admin@admin.com';
        $adminPassword = '123456'; // Use a secure default password for seeding

        $admin = Admin::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Super Admin', // Or any default name
                'password' => bcrypt($adminPassword), // Hash the password
                // Add any other required fields for your Admin model (e.g., 'email_verified_at' => now())
            ]
        );

        // --- Assign ALL permissions for the 'admin' guard directly to the admin user ---
        // This is the key change: directly giving permissions to the user.
        $admin->givePermissionTo(Permission::where('guard_name', 'admin')->get());

        $this->command->info("Admin user '{$adminEmail}' created/found and assigned all 'admin' guard permissions directly.");
    }
}
