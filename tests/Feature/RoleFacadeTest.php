<?php

namespace Lararole\Tests\Feature;

use Lararole\Tests\TestCase;

class RoleFacadeTest extends TestCase
{
    public function testCreateRoleFacade()
    {
        $this->artisan('migrate:modules');

        $role = role()->create('Super Admin');

        $this->assertEquals('Super Admin', $role->name);
    }
}