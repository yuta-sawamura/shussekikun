<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;
use App\Models\Store;
use App\Models\Organization;
use App\Models\Category;
use App\Models\Classwork;
use App\Models\Schedule;
use App\Enums\User\Role;
use App\Enums\Day;

class ScheduleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->organization = factory(Organization::class)->create();
        $this->store = factory(Store::class)->create([
            'organization_id' => $this->organization->id
        ]);
        $this->classwork = factory(Classwork::class)->create([
            'organization_id' => $this->organization->id
        ]);
        $this->schedule = factory(Schedule::class)->create([
            'store_id' => $this->store->id,
            'classwork_id' => $this->classwork->id,
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

    public function test_スケジュール一覧画面にアクセス時にステータスコード200を返す()
    {
        $response = $this->actingAs($this->organization_admin_user)->get('admin/schedule');
        $response->assertStatus(200);
    }

    public function test_スケジュールを登録できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/schedule');
        $data = [
            'store_id' => $this->store->id,
            'classwork_id' => $this->classwork->id,
            'day' => Day::Mon,
            'start_at' => '10:00',
            'end_at' => '11:00',
        ];
        $this->post('admin/schedule/store', $data);
        $this->assertDatabaseHas('schedules', $data);
    }

    public function test_スケジュールを編集できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/schedule');
        $this->assertDatabaseHas('schedules', [
            'id' => $this->schedule->id,
        ]);
        $new_data = [
            'store_id' => $this->store->id,
            'classwork_id' => $this->classwork->id,
            'day' => Day::Tue,
            'start_at' => '20:00',
            'end_at' => '21:00',
        ];
        $this->assertDatabaseMissing('schedules', $new_data);
        $this->post('admin/schedule/update/' . $this->schedule->id, $new_data);
        $this->assertDatabaseHas('schedules', $new_data);
    }

    public function test_別組織のスケジュールを編集できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/schedule');
        $this->assertDatabaseHas('schedules', [
            'id' => $this->schedule->id,
        ]);
        $new_data = [
            'store_id' => $this->store->id,
            'classwork_id' => $this->classwork->id,
            'day' => Day::Tue,
            'start_at' => '20:00',
            'end_at' => '21:00',
        ];
        $this->assertDatabaseMissing('schedules', $new_data);
        $this->post('admin/schedule/update/' . $this->schedule->id, $new_data);
        $this->assertDatabaseMissing('schedules', $new_data);
    }

    public function test_スケジュールを削除できる()
    {
        $this->actingAs($this->organization_admin_user)->get('admin/schedule');
        $this->assertDatabaseHas('schedules', [
            'id' => $this->schedule->id,
        ]);
        $this->post('admin/schedule/delete/' . $this->schedule->id);
        $this->assertDatabaseMissing('schedules', [
            'id' => $this->schedule->id,
        ]);
    }

    public function test_別組織のスケジュールを削除できない()
    {
        $this->actingAs($this->other_organization_admin_user)->get('admin/schedule');
        $this->assertDatabaseHas('schedules', [
            'id' => $this->schedule->id,
        ]);
        $this->post('admin/schedule/delete/' . $this->schedule->id);
        $this->assertDatabaseHas('schedules', [
            'id' => $this->schedule->id,
        ]);
    }
}
