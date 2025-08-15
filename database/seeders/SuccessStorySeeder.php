<?php

namespace Database\Seeders;

use App\Models\SuccessStory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccessStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuccessStory::create([
            'title' => [
                    'en' => 'Badry Mohammed , 46 years old',
                    'ar' => 'بدري محمد ، 46 سنة',
            ],
            'content' => [
                    'en' => 'Thanks to the site that gave me the opportunity to get to know my other half in a short time that did not exceed a month. I renew my greetings to all members of the site with the highest expressions of appreciation and respect.',
                    'ar' => 'شكرا للموقع الذي اتاح لي فرصة للتعرف على نصفي الثاني وفي وقت وجيز لم يتعدى الشهر اجدد تحياتي لجميع أعضاء الموقع مع أسمي عبارات التقدير و الأحترام',
            ],
            'published_status' => 1,
            'status' => 'published'
            // 'image' => ,
        ]);
    }
}
