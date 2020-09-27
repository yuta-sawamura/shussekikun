<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Organization;
use App\Models\Store;

class HomeControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_非ログインユーザーがアクセス時にステータスコード302を返す()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    public function test_ログインアカウントがアクセス時にステータスコード200を返す()
    {
        $organization = factory(Organization::class)->create();
        $store = factory(Store::class)->create();
        $user = factory(User::class)->create([
            'organization_id' => $organization->id,
            'store_id' => $store->id,
        ]);

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }
}
