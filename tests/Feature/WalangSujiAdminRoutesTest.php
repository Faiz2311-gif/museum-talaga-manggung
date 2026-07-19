<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class WalangSujiAdminRoutesTest extends TestCase
{
    public function test_walang_suji_admin_edit_route_is_registered(): void
    {
        $this->assertTrue(Route::has('admin.walangsuji.edit'));
    }
}
