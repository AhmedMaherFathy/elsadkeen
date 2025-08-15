<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'title' => [
                    'en' => 'Marriage without fear How to get rid of social phobia?',
                    'ar' => 'الزواج بلا خوف كيف تتخلص من الرهاب الإجتماعي؟',
            ],
            'content' => [
                    'en' => 'Marriage phobia or marriage gomophobia are all terms that you may have heard about before or felt their symptoms and they may have affected your emotional state with your partner or may have prevented you from completing the marriage step, so we have prepared this article.',
                    'ar' => 'رهاب الزواج او جوموفوبيا الزواج كلها مصطلحات ربما سمعت عنها من قبل او شعرت بأعراضها وربما أثرت على حالتك اك العاطفية من شريك حساتك أو قد تكون منعتك من إكمال خطوة الزواج لذلك أعددنا هذا المقال ',
            ],
            'published_status' => 1,
            // 'image' => ,
        ]);
    }
}
