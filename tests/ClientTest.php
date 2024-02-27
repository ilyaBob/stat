<?php

namespace Tests;

use App\Models\User;

abstract class ClientTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // Мокаем авторизацию
        $user = User::factory()->create(['role' => 'user']);
        $this->user = $user;
        $this->actingAs($this->user);
    }
}
