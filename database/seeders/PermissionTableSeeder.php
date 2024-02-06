<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{


$permissions = [

        'show_annoncement',
        'show_archive annoncement',
        'show_comagnies',
        'show_roles',
        'show_users',

        'add_annoncement',
        'add_archive annoncement',
        'add_comagnies',
        'add_roles',
        'add_users',

        'delete_annoncement',
        'delete_archive annoncement',
        'delete_comagnies',
        'delete_roles',
        'delete_users',

        
        'update_annoncement',
        'update_archive annoncement',
        'update_comagnies',
        'update_roles',
        'update_users',
        

];



 

foreach ($permissions as $permissionName) {
    $existingPermission = Permission::where('name', $permissionName)->first();
    if (!$existingPermission) {
        Permission::create(['name' => $permissionName]);
    }
}
}

}