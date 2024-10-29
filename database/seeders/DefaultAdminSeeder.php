<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'login' => 'sa',
            'email' => 'default_admin@mail.ru',
            'phone' => '89378031770',
            'first_name' => 'Ivan',
            'second_name' => 'Ivanov',
            'last_name' => 'Ivanovich',
            'sex' => 'Мужчина',
            'date_birth' => '1990-01-01',
            'image_avatar' => '265518be-f238-401b-8424-77239b922e6b.jpg', //Если админ удалён, то создай заново с тем же названием и типом изображение в папке storage/app/public/images/dynamic/avatars
            'password' => Hash::make('1234567890'),
            'description' => 'Админ для создания других пользователей',
            'role' => 'admin',
        ]);
    }
}
