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

        'show-annoncement',
        'show-archive annoncement',
        'show-comagnies',
        'show-roles',
        'show-users',

        'add-annoncement',
        'add-archive annoncement',
        'add-comagnies',
        'add-roles',
        'add-users',

        'delete-annoncement',
        'delete-archive annoncement',
        'delete-comagnies',
        'delete-roles',
        'delete-users',

        
        'update-annoncement',
        'update-archive annoncement',
        'update-comagnies',
        'update-roles',
        'update-users',
        

];



 

foreach ($permissions as $permissionName) {
    $existingPermission = Permission::where('name', $permissionName)->first();
    if (!$existingPermission) {
        Permission::create(['name' => $permissionName]);
    }
}
}

}