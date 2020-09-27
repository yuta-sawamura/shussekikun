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
use App\Enums\User\Status;

class UserControllerTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->organization = factory(Organization::class)->create();
        $this->store = factory(Store::class)->create([
            'organization_id' => $this->organization->id
        ]);
        $this->category = factory(Category::class)->create([
            'organization_id' => $this->organization->id
        ]);

        // システム管理者アカウント
        $this->system_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'role' => Role::System
        ]);

        // 組織管理者アカウント
        $this->organization_admin_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'role' => Role::Organization_admin
        ]);

        // 共有アカウント
        $this->store_share_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'role' => Role::Store_share
        ]);

        // 会員アカウント
        $this->normal_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'role' => Role::Normal
        ]);
    }

    public function test_非ログインアユーザーがアクセス時にステータスコード302を返す()
    {
        $response = $this->get('admin');
        $response->assertStatus(302);
    }

    public function test_共有アカウントがアクセス時にステータスコード403を返す()
    {
        $response = $this->actingAs($this->store_share_user)->get('admin');
        $response->assertStatus(403);
    }

    public function test_システム管理者アカウントがアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->system_user)->get('admin');
        $response->assertStatus(200);
    }

    public function test_組織管理者アカウントがアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('admin');
        $response->assertStatus(200);
    }

    public function test_会員を登録できる()
    {
        $this->actingAs($this->organization_admin_user)->get('/admin/user/create');
        $data = [
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'category_id' => $this->category->id,
            'sei' => '山田',
            'mei' => '太郎',
            'sei_kana' => 'ヤマダ',
            'mei_kana' => 'タロウ',
            'gender' => 1,
            'email' => 'yamada@gmail.com',
            'birth' => '2015-10-12',
            'role' => Role::Normal,
            'password' => '12345678',
            'status' => Status::Continue,
        ];
        $response = $this->post('/admin/user/store', $data);
        $response->assertSessionHas('success_message', '会員を追加しました。');
        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
        ]);
    }

    public function test_会員を編集できる()
    {
        $this->actingAs($this->organization_admin_user)->get('/admin/user/edit');
        $new_email = 'new@gmail.com';
        $data = [
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'category_id' => $this->category->id,
            'sei' => '鈴木',
            'mei' => '花子',
            'sei_kana' => 'スズキ',
            'mei_kana' => 'ハナコ',
            'gender' => 2,
            'email' => $new_email,
            'birth' => '2015-10-12',
            'role' => Role::Normal,
            'password' => '12345678',
            'status' => Status::Continue,
        ];
        $response = $this->post('/admin/user/update/' . $this->store_share_user->id, $data);
        $response->assertSessionHas('success_message', '会員情報を編集しました。');
        $this->assertDatabaseHas('users', [
            'email' => $new_email,
        ]);
    }

    public function test_会員の詳細画面を閲覧できる()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('/admin/user/show/' . $this->normal_user->id);
        $response->assertStatus(200);
    }

    public function test_会員を削除できる()
    {
        $this->actingAs($this->organization_admin_user)->get('/admin/user/edit/' . $this->normal_user->id);
        $this->assertDatabaseHas('users', [
            'id' => $this->normal_user->id,
        ]);
        $response = $this->get('/admin/user/delete/' . $this->normal_user->id);
        $response->assertSessionHas('success_message', '会員を削除しました。');
        $this->assertDatabaseMissing('users', [
            'id' => $this->normal_user->id,
        ]);
    }
}
