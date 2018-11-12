<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        // create admin role
        // we r not using the convenient way of coading
        // its eassy to understand how many roles we r creating
        // and at the sametime attach the role to them
        // we can also code the other way ///
        $admin = new Role();
        $admin->name = "admin";
        // display_name and description optional
        $admin->display_name = "ADMIN";
        $admin->save();

        // create Editor role
        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "Editor";
        $editor->save();

        // create Author role
        $author = new Role();
        $author->name = "author";
        $author->display_name = "Author";
        $author->save();


        // ATTACH ROLE to User
        // user id 1 as $admin
        $u1 = User::find(1);
        $u1->detachRole($admin);
        $u1->attachRole($admin);
        // attachRole() is from laratrust
        // which auto fills role_user table ////////////////

        // user id 2 as $editor
        $u2 = User::find(2);
        $u2->detachRole($editor);
        $u2->attachRole($editor);

        // user id 3 as $author
        $u3 = User::find(3);
        $u3->detachRole($author);
        $u3->attachRole($author);









    }
}
