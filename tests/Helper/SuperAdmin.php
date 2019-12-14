<?php

namespace Lararole\Tests\Helper;

use Lararole\Models\Role;
use Lararole\Models\Module;
use Lararole\Tests\Models\User;
use Illuminate\Support\Facades\Artisan;

class SuperAdmin
{
    public $user, $role, $modules;

    public function __construct()
    {
        Artisan::call('migrate:modules');

        $this->role = Role::create([
            'name' => 'Super Admin',
        ]);

        $this->modules = Module::root()->get();

        $this->role->modules()->attach($this->modules, ['permission' => 'write']);

        $this->user = User::create([
            'name' => 'Super Admin',
        ]);

        $this->user->roles()->attach($this->role);
    }
}