<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'name' => 'Название',
                'key' => 'site_name',
                'value' => 'Calculator'
            ],
            [
                'name' => 'Заголовок главной страницы',
                'key' => 'hero_title',
                'value' => 'Онлайн калькуляторы, конвертеры и полезные инструменты '
            ],
            [
                'name' => 'Описание главной страницы',
                'key' => 'hero_description',
                'value' => 'Calcutor.ru – это каталог онлайн калькуляторов по различным тематикам. Выполненные на калькуляторах расчеты можно распечатывать или сохранять. Для зарегистрированных пользователей сохраненные расчеты доступны с любого устройства. Для каждого калькулятора есть виджет, который можно бесплатно установить на любой сайт. '
            ],
            [
                'name' => 'Телефон',
                'key' => 'phone',
                'value' => '+375296666666'
            ],
            [
                'name' => 'Электронная почта',
                'key' => 'email',
                'value' => 'satan@mail.ru'
            ],
            [
                'name' => 'Адрес',
                'key' => 'address',
                'value' => 'Hell Street 666'
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
