<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

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
        // 組織管理者アカウント
        $this->organization_admin_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'role' => Role::Organization_admin
        ]);
        $this->news = factory(News::class)->create([
            'store_id' => $this->store->id,
        ]);

        // 別組織
        $this->other_organization = factory(Organization::class)->create();
        $this->other_store = factory(Store::class)->create([
            'organization_id' => $this->other_organization->id
        ]);
        $this->other_organization_admin_user = factory(User::class)->create([
            'organization_id' => $this->other_organization->id,
            'role' => Role::Organization_admin
        ]);
    }

    public function test_お知らせ一覧画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('admin/news');
        $response->assertStatus(200);
    }

    public function test_お知らせ詳細画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('admin/news/show/' . $this->news->id);
        $response->assertStatus(200);
    }

    public function test_別組織管理者がお知らせ詳細画面にアクセス時にステータスコード403を返す()
    {
        $response = $this->actingAs($this->other_organization_admin_user)->get('admin/news/show/' . $this->news->id);
        $response->assertStatus(403);
    }

    public function test_お知らせを登録できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/news/create');
        $data = [
            'store_id' => $this->store->id,
            'title' => '８月のお知らせ',
            'content' => '休館です。'
        ];
        $response = $this->post('admin/news/store', $data);
        $response->assertSessionHas('success_message', 'お知らせを追加しました。');
        $this->assertDatabaseHas('news', $data);
    }

    public function test_お知らせを編集できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/news/edit');
        $this->assertDatabaseHas('news', [
            'id' => $this->news->id,
        ]);
        $new_data = [
            'store_id' => $this->store->id,
            'title' => '改定８月のお知らせ',
            'content' => '休館は上旬までです。'
        ];
        $this->assertDatabaseMissing('news', $new_data);
        $response = $this->post('admin/news/update/' . $this->news->id, $new_data);
        $response->assertSessionHas('success_message', 'お知らせを編集しました。');
        $this->assertDatabaseHas('news', $new_data);
    }

    public function test_別組織のお知らせを編集できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/news/edit');
        $this->assertDatabaseHas('news', [
            'id' => $this->news->id,
        ]);
        $new_data = [
            'store_id' => $this->store->id,
            'title' => '改定８月のお知らせ',
            'content' => '休館は上旬までです。'
        ];
        $this->assertDatabaseMissing('news', $new_data);
        $this->post('admin/news/update/' . $this->news->id, $new_data);
        $this->assertDatabaseMissing('news', $new_data);
    }

    public function test_お知らせを削除できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/news/edit');
        $this->assertDatabaseHas('news', [
            'id' => $this->news->id,
        ]);
        $response = $this->get('admin/news/delete/' . $this->news->id);
        $response->assertSessionHas('success_message', 'お知らせを削除しました。');
        $this->assertDatabaseMissing('news', [
            'id' => $this->news->id,
        ]);
    }

    public function test_別組織のお知らせを削除できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/news/edit');
        $this->assertDatabaseHas('news', [
            'id' => $this->news->id,
        ]);
        $this->post('admin/news/delete/' . $this->news->id);
        $this->assertDatabaseHas('news', [
            'id' => $this->news->id,
        ]);
    }
}
