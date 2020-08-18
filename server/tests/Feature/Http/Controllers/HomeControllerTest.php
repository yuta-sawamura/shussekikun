<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;

class HomeControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * ログインユーザーのアクセス
     *
     * @return void
     */
    public function testIndex()
    {
        $organization = factory(Organization::class)->create();
        $store = factory(Store::class)->create([
            'organization_id' => $organization->id
        ]);
        $user = factory(User::class)->create([
            'organization_id' => $organization->id,
            'store_id' => $store->id

        ]);
        //dd($user);
        $response = $this->actingAs($user)->get('/');
        dd($response);
        $response->assertStatus(200);
    }
}
