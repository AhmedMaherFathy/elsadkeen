<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nationalities = [
            ['en' => 'Egyptian',     'ar' => 'مصري'],
            ['en' => 'Saudi',        'ar' => 'سعودي'],
            ['en' => 'Emirati',      'ar' => 'إماراتي'],
            ['en' => 'Kuwaiti',      'ar' => 'كويتي'],
            ['en' => 'Qatari',       'ar' => 'قطري'],
            ['en' => 'Jordanian',    'ar' => 'أردني'],
            ['en' => 'Lebanese',     'ar' => 'لبناني'],
            ['en' => 'Syrian',       'ar' => 'سوري'],
            ['en' => 'Palestinian',  'ar' => 'فلسطيني'],
            ['en' => 'Iraqi',        'ar' => 'عراقي'],
            ['en' => 'Tunisian',     'ar' => 'تونسي'],
            ['en' => 'Algerian',     'ar' => 'جزائري'],
            ['en' => 'Moroccan',     'ar' => 'مغربي'],
            ['en' => 'Sudanese',     'ar' => 'سوداني'],
            ['en' => 'Bahraini',     'ar' => 'بحريني'],
            ['en' => 'Omani',        'ar' => 'عماني'],
            ['en' => 'Libyan',       'ar' => 'ليبي'],
            ['en' => 'Yemeni',       'ar' => 'يمني'],
        ];

        foreach ($nationalities as $nationality) {
            Nationality::create([
                'name' => [
                    'en' => $nationality['en'],
                    'ar' => $nationality['ar'],
                ]
            ]);
        } 
    }
}
