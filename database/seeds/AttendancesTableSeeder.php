<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\User;
use App\Models\Attendance;

class AttendancesTableSeeder extends Seeder
{
    const SHIBUYA = 1;
    const SHINJUKU = 2;

    /**
     * 店舗と日付を条件にしてユーザーを返す関数
     *
     * @param int $store_id
     * @param string $date
     * @return Collection
     */
    private function getUser(int $store_id, string $date): Collection
    {
        return User::where('store_id', $store_id)
            ->whereDate('created_at', '<=', $date)
            ->pluck('id');
    }

    /**
     * 出席テーブルに値が存在するか真偽値を返す関数
     *
     * @param int $user_id
     * @param int $schedule_id
     * @param string $date
     * @return bool
     */
    private function isAttendance(int $user_id, int $schedule_id, string $date): bool
    {
        return Attendance::where('user_id', $user_id)
            ->where('schedule_id', $schedule_id)
            ->where('date', $date)
            ->exists();
    }

    /**
     * 挿入用データの配列を返す関数
     *
     * @param int $user_id
     * @param int $schedule_id
     * @param int $date
     * @return array
     */
    private function getData(int $user_id, int $schedule_id, string $date): array
    {
        return [
            'user_id' => $user_id,
            'schedule_id' => $schedule_id,
            'date' => $date,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 2019年1月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-01-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '1', '1');
            $end = Carbon::create('2019', '1', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年1月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-01-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '1', '1');
            $end = Carbon::create('2019', '1', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年2月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-02-28');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '2', '1');
            $end = Carbon::create('2019', '2', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年2月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-02-28');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '2', '1');
            $end = Carbon::create('2019', '2', '28');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年3月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-03-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '3', '1');
            $end = Carbon::create('2019', '3', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年3月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-03-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '3', '1');
            $end = Carbon::create('2019', '3', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年4月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-04-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '4', '1');
            $end = Carbon::create('2019', '4', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年4月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-04-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '4', '1');
            $end = Carbon::create('2019', '4', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年5月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-05-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '5', '1');
            $end = Carbon::create('2019', '5', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年5月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-05-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '5', '1');
            $end = Carbon::create('2019', '5', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年6月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-06-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '6', '1');
            $end = Carbon::create('2019', '6', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年6月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-06-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '6', '1');
            $end = Carbon::create('2019', '6', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年7月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-07-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '7', '1');
            $end = Carbon::create('2019', '7', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年7月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-07-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '7', '1');
            $end = Carbon::create('2019', '7', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年8月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-08-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '8', '1');
            $end = Carbon::create('2019', '8', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年8月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-08-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '8', '1');
            $end = Carbon::create('2019', '8', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年9月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-09-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '9', '1');
            $end = Carbon::create('2019', '9', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年9月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-09-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '9', '1');
            $end = Carbon::create('2019', '9', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年10月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-10-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '10', '1');
            $end = Carbon::create('2019', '10', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年10月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-10-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '10', '1');
            $end = Carbon::create('2019', '10', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年11月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-11-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '11', '1');
            $end = Carbon::create('2019', '11', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年11月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-11-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '11', '1');
            $end = Carbon::create('2019', '11', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年12月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2019-12-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '12', '1');
            $end = Carbon::create('2019', '12', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2019年12月新宿店
        $users = $this->getUser(self::SHINJUKU, '2019-12-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2019', '12', '1');
            $end = Carbon::create('2019', '12', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年1月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-01-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '01', '1');
            $end = Carbon::create('2020', '01', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年1月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-01-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '01', '1');
            $end = Carbon::create('2020', '01', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年2月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-02-29');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '02', '1');
            $end = Carbon::create('2020', '02', '29');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年2月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-02-29');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '02', '1');
            $end = Carbon::create('2020', '02', '29');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年3月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-03-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '03', '1');
            $end = Carbon::create('2020', '03', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年3月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-03-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '03', '1');
            $end = Carbon::create('2020', '03', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年4月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-04-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '04', '1');
            $end = Carbon::create('2020', '04', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年4月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-04-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '04', '1');
            $end = Carbon::create('2020', '04', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年5月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-05-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '05', '1');
            $end = Carbon::create('2020', '05', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年5月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-05-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '05', '1');
            $end = Carbon::create('2020', '05', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年6月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-06-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '06', '1');
            $end = Carbon::create('2020', '06', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年6月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-06-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '06', '1');
            $end = Carbon::create('2020', '06', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年7月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-07-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '07', '1');
            $end = Carbon::create('2020', '07', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年7月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-07-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '07', '1');
            $end = Carbon::create('2020', '07', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年8月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-08-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '08', '1');
            $end = Carbon::create('2020', '08', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年8月新宿店
        $users = $this->getUser(self::SHINJUKU, '2020-08-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '08', '1');
            $end = Carbon::create('2020', '08', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年9月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-09-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '09', '1');
            $end = Carbon::create('2020', '09', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年9月渋谷店
        $users = $this->getUser(self::SHINJUKU, '2020-09-30');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '09', '1');
            $end = Carbon::create('2020', '09', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年10月渋谷店
        $users = $this->getUser(self::SHIBUYA, '2020-10-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '10', '1');
            $end = Carbon::create('2020', '10', '30');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }

        // 2020年10月渋谷店
        $users = $this->getUser(self::SHINJUKU, '2020-10-31');
        $count = $users->count() * 3;
        for ($i = 1; $i <= $count; $i++) {
            $start = Carbon::create('2020', '10', '1');
            $end = Carbon::create('2020', '10', '31');
            $min = strtotime($start);
            $max = strtotime($end);
            $user_id = $users->random();
            $schedule_id = rand(1, 3);
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            if (!$this->isAttendance($user_id, $schedule_id, $date)) DB::table('attendances')->insert($this->getData($user_id, $schedule_id, $date));
        }
    }
}
