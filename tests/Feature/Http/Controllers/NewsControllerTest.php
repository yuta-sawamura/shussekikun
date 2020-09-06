<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;
use App\Models\News;
use App\Enums\User\Role;

class NewsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->organization = factory(Organization::class)->create();
        $this->store = factory(Store::class)->create([
            'organization_id' => $this->organization->id
        ]);
        // 共有アカウント
        $this->store_share_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'role' => Role::Store_share
        ]);
        $this->news = factory(News::class)->create([
            'store_id' => $this->store->id
        ]);

        $this->other_organization = factory(Organization::class)->create();
        $this->other_store = factory(Store::class)->create([
            'organization_id' => $this->other_organization->id
        ]);
        // 別組織の共有アカウント
        $this->other_store_share_user = factory(User::class)->create([
            'organization_id' => $this->other_organization->id,
            'store_id' => $this->other_store->id,
            'role' => Role::Store_share
        ]);
    }

    public function test_お知らせ一覧画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->store_share_user)->get('news');
        $response->assertStatus(200);
    }

    public function test_お知らせ詳細画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->store_share_user)->get('news/show/' . $this->news->id);
        $response->assertStatus(200);
    }

    public function test_別組織のお知らせ詳細画面にアクセス時にステータスコード404を返す()
    {
        $response = $this->actingAs($this->other_store_share_user)->get('news/show/' . $this->news->id);
        $response->assertStatus(404);
    }
}
