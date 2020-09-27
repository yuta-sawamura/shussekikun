<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;
use App\Models\Classwork;
use App\Models\Schedule;
use App\Models\Attendance;
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
        // 組織管理者アカウント
        $this->organization_admin_user = factory(User::class)->create([
            'organization_id' => $this->organization->id,
            'role' => Role::Organization_admin
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
        // スケジュール1
        $this->schedule1 = factory(Schedule::class)->create([
            'store_id' => $this->store->id,
            'classwork_id' => $this->classwork->id,
        ]);
        // スケジュール2
        $this->schedule2 = factory(Schedule::class)->create([
            'store_id' => $this->store->id,
            'classwork_id' => $this->classwork->id,
        ]);
        // 出席
        $this->attendance = factory(Attendance::class)->create([
            'user_id' => $this->normal_user->id,
            'schedule_id' => $this->schedule1->id,
        ]);
    }

    public function test_出席を編集できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/attendance');
        $this->assertDatabaseMissing('attendances', [
            'user_id' => $this->normal_user->id,
            'schedule_id' => $this->schedule2->id
        ]);
        $data = [
            'user_id' => $this->normal_user->id,
            'schedule_id' => $this->schedule2->id,
        ];
        $response = $this->post('/admin/attendance/update/' . $this->attendance->id, $data);
        $response->assertSessionHas('success_message', '出席クラスを編集しました。');
        $this->assertDatabaseHas('attendances', [
            'user_id' => $this->normal_user->id,
            'schedule_id' => $this->schedule2->id
        ]);
    }

    public function test_出席を削除できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/attendance');
        $this->assertDatabaseHas('attendances', [
            'user_id' => $this->normal_user->id,
            'schedule_id' => $this->schedule1->id
        ]);
        $response = $this->get('admin/attendance/delete/' . $this->attendance->id);
        $response->assertSessionHas('success_message', '出席クラスを削除しました。');
        $this->assertDatabaseMissing('attendances', [
            'user_id' => $this->normal_user->id,
            'schedule_id' => $this->schedule1->id
        ]);
    }
}
