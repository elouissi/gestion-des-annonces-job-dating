<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
 use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
    
         $user = User::create([
        'name' => 'student', 
        'email' => 'student@gmail.com',
        'password' => bcrypt('123'),
        'role_name' => "student",
         ]);
  
        $role = Role::create(['name' => 'student']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);


}
}