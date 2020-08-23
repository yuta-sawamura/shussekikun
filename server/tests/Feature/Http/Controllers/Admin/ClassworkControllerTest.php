<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;
use App\Models\Classwork;
use App\Enums\User\Role;

class ClassworkControllerTest extends TestCase
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
        $this->classwork = factory(Classwork::class)->create([
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

    public function test_クラス一覧画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('admin/class');
        $response->assertStatus(200);
    }

    public function test_クラスを登録できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/class');
        $data = [
            'name' => '初級'
        ];
        $this->post('/admin/class/store', $data);
        $this->assertDatabaseHas('classworks', $data);
    }

    public function test_クラスを編集できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/class');
        $this->assertDatabaseHas('classworks', [
            'id' => $this->classwork->id,
        ]);
        $new_data = [
            'name' => '中級'
        ];
        $this->assertDatabaseMissing('classworks', $new_data);
        $this->post('admin/class/update/' . $this->classwork->id, $new_data);
        $this->assertDatabaseHas('classworks', $new_data);
    }

    public function test_別組織のカテゴリーを編集できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/class');
        $this->assertDatabaseHas('classworks', [
            'id' => $this->classwork->id,
        ]);
        $new_data = [
            'name' => '中級'
        ];
        $this->post('admin/class/update/' . $this->classwork->id, $new_data);
        $this->assertDatabaseMissing('classworks', $new_data);
    }

    public function test_カテゴリーを削除できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/class');
        $this->assertDatabaseHas('classworks', [
            'id' => $this->classwork->id,
        ]);
        $this->post('admin/class/delete/' . $this->classwork->id);
        $this->assertDatabaseMissing('classworks', [
            'id' => $this->classwork->id,
        ]);
    }

    public function test_別組織のカテゴリーを削除できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/class');
        $this->assertDatabaseHas('classworks', [
            'id' => $this->classwork->id,
        ]);
        $this->post('admin/class/delete/' . $this->classwork->id);
        $this->assertDatabaseHas('classworks', [
            'id' => $this->classwork->id,
        ]);
    }
}
