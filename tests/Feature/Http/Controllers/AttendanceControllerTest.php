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
use App\Enums\User\Role;

class AttendanceControllerTest extends TestCase
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
        // 会員アカウント
        $this->normal_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'role' => Role::Normal
        ]);
        // 別の会員アカウント2
        $this->normal_user2 = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'store_id' => $this->store->id,
            'role' => Role::Normal
        ]);
        // 別の会員アカウント3
        $this->normal_user3 = factory(User::class)->create([
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
    }

    public function test_出席できる()
    {
        $this->actingAs($this->store_share_user)->get('/');
        $data = [
            'user_id' => $this->normal_user2->id,
            'schedule_id' => $this->schedule->id,
        ];
        $response = $this->post('attendance/store', $data);
        $response->assertSessionHas('success_message', '出席しました。');
        $this->assertDatabaseHas('attendances', [
            'user_id' => $this->normal_user2->id,
            'schedule_id' => $this->schedule->id
        ]);
    }

    public function test_一括出席できる()
    {
        $this->actingAs($this->store_share_user)->get('/');
        $data = [
            'users' => [
                ['user_id' => $this->normal_user2->id],
                ['user_id' => $this->normal_user3->id],
            ],
            'schedule_id' => $this->schedule->id,
        ];
        $response = $this->post('attendance/store_multiple', $data);
        $response->assertSessionHas('success_message', '出席しました。');
        $this->assertDatabaseHas('attendances', [
            'user_id' => $this->normal_user2->id,
            'schedule_id' => $this->schedule->id
        ]);
        $this->assertDatabaseHas('attendances', [
            'user_id' => $this->normal_user3->id,
            'schedule_id' => $this->schedule->id
        ]);
    }
}
