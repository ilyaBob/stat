<?php

namespace Tests;

use App\Models\User;

abstract class AdminTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // Мокаем авторизацию
        $user = User::factory()->create(['role' => 'admin']);
        $this->user = $user;
        $this->actingAs($this->user);
    }
}
