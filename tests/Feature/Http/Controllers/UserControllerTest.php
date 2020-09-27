<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;
use App\Models\Classwork;
use App\Models\Schedule;
use App\Models\Attendance;
use App\Enums\User\Role;

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
        // 共有アカウント
        $this->store_share_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'role' => Role::Store_share
        ]);
        // 一般アカウント
        $this->normal_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'role' => Role::Normal
        ]);
        // クラス
        $this->classwork = factory(Classwork::class)->create([
            'organization_id' => $this->organization->id,
        ]);
        // スケジュール
        $this->schedule = factory(Schedule::class)->create([
            'store_id' => $this->store->id,
            'classwork_id' => $this->classwork->id,
        ]);
        // 出席
        $this->attendance = factory(Attendance::class)->create([
            'user_id' => $this->normal_user->id,
            'schedule_id' => $this->schedule->id,
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

    public function test_会員一覧画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->store_share_user)->get('user');
        $response->assertStatus(200);
    }

    public function test_会員詳細画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->store_share_user)->get('user/show/' . $this->normal_user->id);
        $response->assertStatus(200);
    }

    public function test_別組織の会員詳細画面にアクセス時にステータスコード403を返す()
    {
        $response = $this->actingAs($this->other_store_share_user)->get('user/show/' . $this->normal_user->id);
        $response->assertStatus(403);
    }

    public function test_ランキング画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->store_share_user)->get('rank');
        $response->assertStatus(200);
    }
}
