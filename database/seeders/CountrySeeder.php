<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['en' => 'Egypt',                 'ar' => 'مصر'],
            ['en' => 'Saudi Arabia',         'ar' => 'المملكة العربية السعودية'],
            ['en' => 'United Arab Emirates', 'ar' => 'الإمارات العربية المتحدة'],
            ['en' => 'Kuwait',               'ar' => 'الكويت'],
            ['en' => 'Qatar',                'ar' => 'قطر'],
            ['en' => 'Jordan',               'ar' => 'الأردن'],
            ['en' => 'Lebanon',              'ar' => 'لبنان'],
            ['en' => 'Syria',                'ar' => 'سوريا'],
            ['en' => 'Palestine',            'ar' => 'فلسطين'],
            ['en' => 'Iraq',                 'ar' => 'العراق'],
            ['en' => 'Tunisia',              'ar' => 'تونس'],
            ['en' => 'Algeria',              'ar' => 'الجزائر'],
            ['en' => 'Morocco',              'ar' => 'المغرب'],
            ['en' => 'Sudan',                'ar' => 'السودان'],
            ['en' => 'Bahrain',              'ar' => 'البحرين'],
            ['en' => 'Oman',                 'ar' => 'عمان'],
            ['en' => 'Libya',                'ar' => 'ليبيا'],
            ['en' => 'Yemen',                'ar' => 'اليمن'],
        ];

        foreach ($countries as $country) {
            Country::create([
                'name' => [
                    'en' => $country['en'],
                    'ar' => $country['ar'],
                ],
            ]);
        }
    }
}
