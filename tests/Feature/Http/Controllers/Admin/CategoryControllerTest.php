<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;
use App\Models\Category;
use App\Enums\User\Role;

class CategoryControllerTest extends TestCase
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
        $this->category = factory(Category::class)->create([
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

    public function test_カテゴリー一覧画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('admin/category');
        $response->assertStatus(200);
    }

    public function test_カテゴリーを登録できる()
    {
        $this->actingAs($this->organization_admin_user)->get('/admin/category/create');
        $data = [
            'name' => '大人'
        ];
        $response = $this->post('/admin/category/store', $data);
        $response->assertSessionHas('success_message', 'カテゴリーを追加しました。');
        $this->assertDatabaseHas('categories', $data);
    }

    public function test_カテゴリーを編集できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/category');
        $this->assertDatabaseHas('categories', [
            'id' => $this->category->id,
        ]);
        $new_data = [
            'name' => '上級大人'
        ];
        $this->assertDatabaseMissing('categories', $new_data);
        $response = $this->post('admin/category/update/' . $this->category->id, $new_data);
        $response->assertSessionHas('success_message', 'カテゴリーを編集しました。');
        $this->assertDatabaseHas('categories', $new_data);
    }

    public function test_別組織のカテゴリーを編集できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/category');
        $this->assertDatabaseHas('categories', [
            'id' => $this->category->id,
        ]);
        $new_data = [
            'name' => '上級大人'
        ];
        $this->post('admin/category/update/' . $this->category->id, $new_data);
        $this->assertDatabaseMissing('categories', $new_data);
    }

    public function test_カテゴリーを削除できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/category');
        $this->assertDatabaseHas('categories', [
            'id' => $this->category->id,
        ]);
        $response = $this->get('admin/category/delete/' . $this->category->id);
        $response->assertSessionHas('success_message', 'カテゴリーを削除しました。');
        $this->assertDatabaseMissing('users', [
            'id' => $this->category->id,
        ]);
    }

    public function test_別組織のカテゴリーを削除できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/category');
        $this->assertDatabaseHas('categories', [
            'id' => $this->category->id,
        ]);
        $this->post('admin/category/delete/' . $this->category->id);
        $this->assertDatabaseHas('categories', [
            'id' => $this->category->id,
        ]);
    }
}
