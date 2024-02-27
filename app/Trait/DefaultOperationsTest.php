<?php

namespace App\Trait;

trait DefaultOperationsTest
{
    public function statusShouldBeRedirect($response): void
    {
        if ($response->status() != 302) {
            dump($response->content());
        }

        $response->assertStatus(302);
    }
    public function statusShouldBeOk($response): void
    {
        if ($response->status() != 200) {
            dump($response->content());
        }

        $response->assertStatus(200);
    }
}
