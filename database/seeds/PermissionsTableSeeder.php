<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        // as per our permissions goes ,as follows

        // CRUP POST
        $crudPost = new Permission();
        $crudPost->name = "crud_post";
        $crudPost->save();

        // Uo Post
        $uoPost = new Permission();
        $uoPost->name = "uo_post";
        $uoPost->save();

        // Do Post
        $doPost = new Permission();
        $doPost->name = "do_post";
        $doPost->save();

        // CRUD Category
        $crudCategory = new Permission();
        $crudCategory->name = "crud_category";
        $crudCategory->save();

        // CRUD User
        $crudUser = new Permission();
        $crudUser->name = "crud_user";
        $crudUser->save();


        // Attach Permission to role
        $admin = Role::find(1);
        $editor = Role::find(2);
        $author = Role::find(3);

        $admin->detachPermissions([$crudPost, $uoPost, $doPost, $crudCategory, $crudUser]);
        $admin->attachPermissions([$crudPost, $uoPost, $doPost, $crudCategory, $crudUser]);
        // attachRole() is from laratrust
        // which auto fills permission_role table ////////////////

        $editor->detachPermissions([$crudPost, $uoPost, $doPost, $crudCategory]);
        $editor->attachPermissions([$crudPost, $uoPost, $doPost, $crudCategory]);

        $author->detachPermissions([$crudPost]);
        $author->attachPermissions([$crudPost]);

    }
}
