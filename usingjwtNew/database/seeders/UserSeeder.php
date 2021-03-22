<?php

namespace Database\Seeders;

use App\Models\AuthRole;
use App\Models\Detail_user;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detailUserId = Detail_user::create([
            'fullname' => 'adi data admin',
            'name' => 'adi data',
            'birth_date' => Carbon::now()->toDateTimeString(),
            'join_date' => Carbon::now()->toDateTimeString(),
            'position_id' => 1,
            'NIK' => '1000000000',
            'NPWP' => '1000000000',
            'email' => 'admin@adi-internal.com'
        ])->id;

        $userId = User::create([
            'detail_user_id' => $detailUserId,
            'username' => 'adidataadmin',
            'password' => Hash::make('4did4t4'),
        ])->id;

        $authRole = AuthRole::create([
            'user_id' => $userId,
            'role_id' => 1,
            'application_id' => 1
        ]);
    }
}
