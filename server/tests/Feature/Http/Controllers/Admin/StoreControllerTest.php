<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;
use App\Enums\User\Role;

class StoreControllerTest extends TestCase
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
        $this->store = factory(Store::class)->create([
            'organization_id' => $this->organization->id
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

    public function test_店舗一覧画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('admin/store');
        $response->assertStatus(200);
    }

    public function test_店舗を登録できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/store');
        $data = [
            'name' => '埼玉県店舗'
        ];
        $this->post('admin/store/store', $data);
        $this->assertDatabaseHas('stores', $data);
    }

    public function test_店舗を編集できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/store');
        $this->assertDatabaseHas('stores', [
            'id' => $this->store->id,
        ]);
        $new_data = [
            'name' => '栃木県店舗'
        ];
        $this->assertDatabaseMissing('stores', $new_data);
        $this->post('admin/store/update/' . $this->store->id, $new_data);
        $this->assertDatabaseHas('stores', $new_data);
    }

    public function test_別組織の店舗を編集できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/store');
        $this->assertDatabaseHas('stores', [
            'id' => $this->store->id,
        ]);
        $new_data = [
            'name' => '栃木県店舗'
        ];
        $this->post('admin/store/update/' . $this->store->id, $new_data);
        $this->assertDatabaseMissing('stores', $new_data);
    }

    public function test_店舗を削除できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/store');
        $this->assertDatabaseHas('stores', [
            'id' => $this->store->id,
        ]);
        $this->post('admin/store/delete/' . $this->store->id);
        $this->assertDatabaseMissing('stores', [
            'id' => $this->store->id,
        ]);
    }

    public function test_別組織の店舗を削除できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/store');
        $this->assertDatabaseHas('stores', [
            'id' => $this->store->id,
        ]);
        $this->post('admin/store/delete/' . $this->store->id);
        $this->assertDatabaseHas('stores', [
            'id' => $this->store->id,
        ]);
    }
}
