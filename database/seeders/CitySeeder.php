<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['en' => 'Egypt', 'ar' => 'مصر'],
            ['en' => 'Saudi Arabia', 'ar' => 'المملكة العربية السعودية'],
            ['en' => 'United Arab Emirates', 'ar' => 'الإمارات العربية المتحدة'],
            ['en' => 'Kuwait', 'ar' => 'الكويت'],
            ['en' => 'Qatar', 'ar' => 'قطر'],
            ['en' => 'Jordan', 'ar' => 'الأردن'],
            ['en' => 'Lebanon', 'ar' => 'لبنان'],
            ['en' => 'Syria', 'ar' => 'سوريا'],
            ['en' => 'Palestine', 'ar' => 'فلسطين'],
            ['en' => 'Iraq', 'ar' => 'العراق'],
            ['en' => 'Tunisia', 'ar' => 'تونس'],
            ['en' => 'Algeria', 'ar' => 'الجزائر'],
            ['en' => 'Morocco', 'ar' => 'المغرب'],
            ['en' => 'Sudan', 'ar' => 'السودان'],
            ['en' => 'Bahrain', 'ar' => 'البحرين'],
            ['en' => 'Oman', 'ar' => 'عمان'],
            ['en' => 'Libya', 'ar' => 'ليبيا'],
            ['en' => 'Yemen', 'ar' => 'اليمن'],
        ];

        $cities = [
    // Egypt
            ['en' => 'Cairo', 'ar' => 'القاهرة', 'country_id' => '1'],
            ['en' => 'Giza', 'ar' => 'الجيزة', 'country_id' => '1'],
            ['en' => 'Alexandria', 'ar' => 'الإسكندرية', 'country_id' => '1'],
            ['en' => 'Port Said', 'ar' => 'بورسعيد', 'country_id' => '1'],
            ['en' => 'Suez', 'ar' => 'السويس', 'country_id' => '1'],
            ['en' => 'Dakahlia', 'ar' => 'الدقهلية', 'country_id' => '1'],
            ['en' => 'Sharqia', 'ar' => 'الشرقية', 'country_id' => '1'],
            ['en' => 'Qalyubia', 'ar' => 'القليوبية', 'country_id' => '1'],
            ['en' => 'Kafr El Sheikh', 'ar' => 'كفر الشيخ', 'country_id' => '1'],
            ['en' => 'Gharbia', 'ar' => 'الغربية', 'country_id' => '1'],
            ['en' => 'Monufia', 'ar' => 'المنوفية', 'country_id' => '1'],
            ['en' => 'Beheira', 'ar' => 'البحيرة', 'country_id' => '1'],
            ['en' => 'Ismailia', 'ar' => 'الإسماعيلية', 'country_id' => '1'],
            ['en' => 'Faiyum', 'ar' => 'الفيوم', 'country_id' => '1'],
            ['en' => 'Beni Suef', 'ar' => 'بني سويف', 'country_id' => '1'],
            ['en' => 'Minya', 'ar' => 'المنيا', 'country_id' => '1'],
            ['en' => 'Asyut', 'ar' => 'أسيوط', 'country_id' => '1'],
            ['en' => 'Sohag', 'ar' => 'سوهاج', 'country_id' => '1'],
            ['en' => 'Qena', 'ar' => 'قنا', 'country_id' => '1'],
            ['en' => 'Aswan', 'ar' => 'أسوان', 'country_id' => '1'],
            ['en' => 'Luxor', 'ar' => 'الأقصر', 'country_id' => '1'],
            ['en' => 'Red Sea', 'ar' => 'البحر الأحمر', 'country_id' => '1'],
            ['en' => 'New Valley', 'ar' => 'الوادي الجديد', 'country_id' => '1'],
            ['en' => 'Matrouh', 'ar' => 'مطروح', 'country_id' => '1'],
            ['en' => 'North Sinai', 'ar' => 'شمال سيناء', 'country_id' => '1'],
            ['en' => 'South Sinai', 'ar' => 'جنوب سيناء', 'country_id' => '1'],

            // Saudi Arabia
            ['ar' => 'الرياض', 'en' => 'Riyadh', 'country_id' => '2'],
            ['ar' => 'جدة', 'en' => 'Jeddah', 'country_id' => '2'],
            ['ar' => 'مكة المكرمة', 'en' => 'Makkah', 'country_id' => '2'],
            ['ar' => 'المدينة المنورة', 'en' => 'Madinah', 'country_id' => '2'],
            ['ar' => 'الدمام', 'en' => 'Dammam', 'country_id' => '2'],
            ['ar' => 'الخبر', 'en' => 'Khobar', 'country_id' => '2'],
            ['ar' => 'الهفوف', 'en' => 'Hofuf', 'country_id' => '2'],
            ['ar' => 'الطائف', 'en' => 'Taif', 'country_id' => '2'],
            ['ar' => 'بريدة', 'en' => 'Buraidah', 'country_id' => '2'],
            ['ar' => 'أبها', 'en' => 'Abha', 'country_id' => '2'],
            ['ar' => 'خميس مشيط', 'en' => 'Khamis Mushait', 'country_id' => '2'],
            ['ar' => 'نجران', 'en' => 'Najran', 'country_id' => '2'],
            ['ar' => 'ينبع', 'en' => 'Yanbu', 'country_id' => '2'],
            ['ar' => 'الجبيل', 'en' => 'Jubail', 'country_id' => '2'],
            ['ar' => 'الخرج', 'en' => 'Al Kharj', 'country_id' => '2'],
            ['ar' => 'حائل', 'en' => 'Hail', 'country_id' => '2'],
            ['ar' => 'القطيف', 'en' => 'Qatif', 'country_id' => '2'],
            ['ar' => 'الرس', 'en' => 'Ar Rass', 'country_id' => '2'],
            ['ar' => 'عرعر', 'en' => 'Arar', 'country_id' => '2'],
            ['ar' => 'سكاكا', 'en' => 'Sakaka', 'country_id' => '2'],
            ['ar' => 'تبوك', 'en' => 'Tabuk', 'country_id' => '2'],
            ['ar' => 'بيشة', 'en' => 'Bisha', 'country_id' => '2'],
            ['ar' => 'صبيا', 'en' => 'Sabya', 'country_id' => '2'],
            ['ar' => 'جازان', 'en' => 'Jazan', 'country_id' => '2'],
            ['ar' => 'الدوادمي', 'en' => 'Dawadmi', 'country_id' => '2'],
            ['ar' => 'المجمعة', 'en' => 'Al Majmaah', 'country_id' => '2'],
            ['ar' => 'الباحة', 'en' => 'Al Bahah', 'country_id' => '2'],

            // UAE
            ['en' => 'Dubai', 'ar' => 'دبي', 'country_id' => '3'],
            ['en' => 'Abu Dhabi', 'ar' => 'أبو ظبي', 'country_id' => '3'],
            ['en' => 'Sharjah', 'ar' => 'الشارقة', 'country_id' => '3'],
            ['en' => 'Al Ain', 'ar' => 'العين', 'country_id' => '3'],
            ['en' => 'Ajman', 'ar' => 'عجمان', 'country_id' => '3'],
            ['en' => 'Ras Al Khaimah', 'ar' => 'رأس الخيمة', 'country_id' => '3'],
            ['en' => 'Fujairah', 'ar' => 'الفجيرة', 'country_id' => '3'],
            ['en' => 'Umm Al Quwain', 'ar' => 'أم القيوين', 'country_id' => '3'],
            ['en' => 'Khor Fakkan', 'ar' => 'خورفكان', 'country_id' => '3'],
            ['en' => 'Dibba Al-Fujairah', 'ar' => 'دبا الفجيرة', 'country_id' => '3'],

            // Kuwait
            ['en' => 'Kuwait City', 'ar' => 'مدينة الكويت', 'country_id' => '4'],
            ['en' => 'Al Ahmadi', 'ar' => 'الأحمدي', 'country_id' => '4'],
            ['en' => 'Hawalli', 'ar' => 'حولي', 'country_id' => '4'],
            ['en' => 'Al Farwaniyah', 'ar' => 'الفروانية', 'country_id' => '4'],
            ['en' => 'Al Jahra', 'ar' => 'الجهراء', 'country_id' => '4'],
            ['en' => 'Mubarak Al-Kabeer', 'ar' => 'مبارك الكبير', 'country_id' => '4'],
            ['en' => 'Salmiya', 'ar' => 'السالمية', 'country_id' => '4'],
            ['en' => 'Sabah Al-Salem', 'ar' => 'صباح السالم', 'country_id' => '4'],

            // Qatar
            ['en' => 'Doha', 'ar' => 'الدوحة', 'country_id' => '5'],
            ['en' => 'Al Rayyan', 'ar' => 'الريان', 'country_id' => '5'],
            ['en' => 'Umm Salal', 'ar' => 'أم صلال', 'country_id' => '5'],
            ['en' => 'Al Wakrah', 'ar' => 'الوكرة', 'country_id' => '5'],
            ['en' => 'Al Khor', 'ar' => 'الخور', 'country_id' => '5'],
            ['en' => 'Dukhan', 'ar' => 'دخان', 'country_id' => '5'],
            ['en' => 'Al Daayen', 'ar' => 'الضعاين', 'country_id' => '5'],
            ['en' => 'Mesaieed', 'ar' => 'مسيعيد', 'country_id' => '5'],

            // Jordan
            ['en' => 'Amman', 'ar' => 'عمان', 'country_id' => '6'],
            ['en' => 'Zarqa', 'ar' => 'الزرقاء', 'country_id' => '6'],
            ['en' => 'Irbid', 'ar' => 'إربد', 'country_id' => '6'],
            ['en' => 'Al Salt', 'ar' => 'السلط', 'country_id' => '6'],
            ['en' => 'Al Karak', 'ar' => 'الكرك', 'country_id' => '6'],
            ['en' => 'Madaba', 'ar' => 'مادبا', 'country_id' => '6'],
            ['en' => 'Mafraq', 'ar' => 'المفرق', 'country_id' => '6'],
            ['en' => 'Jerash', 'ar' => 'جرش', 'country_id' => '6'],
            ['en' => 'Ma\'an', 'ar' => 'معان', 'country_id' => '6'],
            ['en' => 'Aqaba', 'ar' => 'العقبة', 'country_id' => '6'],

            // Lebanon
            ['en' => 'Beirut', 'ar' => 'بيروت', 'country_id' => '7'],
            ['en' => 'Tripoli', 'ar' => 'طرابلس', 'country_id' => '7'],
            ['en' => 'Sidon', 'ar' => 'صيدا', 'country_id' => '7'],
            ['en' => 'Tyre', 'ar' => 'صور', 'country_id' => '7'],
            ['en' => 'Byblos', 'ar' => 'جبيل', 'country_id' => '7'],
            ['en' => 'Zahle', 'ar' => 'زحلة', 'country_id' => '7'],
            ['en' => 'Nabatieh', 'ar' => 'النبطية', 'country_id' => '7'],
            ['en' => 'Baalbek', 'ar' => 'بعلبك', 'country_id' => '7'],
            ['en' => 'Jounieh', 'ar' => 'جونية', 'country_id' => '7'],
            ['en' => 'Batroun', 'ar' => 'البترون', 'country_id' => '7'],

            // Syria
            ['en' => 'Damascus', 'ar' => 'دمشق', 'country_id' => '8'],
            ['en' => 'Aleppo', 'ar' => 'حلب', 'country_id' => '8'],
            ['en' => 'Homs', 'ar' => 'حمص', 'country_id' => '8'],
            ['en' => 'Latakia', 'ar' => 'اللاذقية', 'country_id' => '8'],
            ['en' => 'Hama', 'ar' => 'حماة', 'country_id' => '8'],
            ['en' => 'Raqqa', 'ar' => 'الرقة', 'country_id' => '8'],
            ['en' => 'Deir ez-Zor', 'ar' => 'دير الزور', 'country_id' => '8'],
            ['en' => 'Al-Hasakah', 'ar' => 'الحسكة', 'country_id' => '8'],
            ['en' => 'Qamishli', 'ar' => 'قامشلي', 'country_id' => '8'],
            ['en' => 'Idlib', 'ar' => 'إدلب', 'country_id' => '8'],

            // Palestine
            ['en' => 'Jerusalem', 'ar' => 'القدس', 'country_id' => '9'],
            ['en' => 'Gaza', 'ar' => 'غزة', 'country_id' => '9'],
            ['en' => 'Hebron', 'ar' => 'الخليل', 'country_id' => '9'],
            ['en' => 'Nablus', 'ar' => 'نابلس', 'country_id' => '9'],
            ['en' => 'Ramallah', 'ar' => 'رام الله', 'country_id' => '9'],
            ['en' => 'Bethlehem', 'ar' => 'بيت لحم', 'country_id' => '9'],
            ['en' => 'Jenin', 'ar' => 'جنين', 'country_id' => '9'],
            ['en' => 'Tulkarm', 'ar' => 'طولكرم', 'country_id' => '9'],
            ['en' => 'Qalqilya', 'ar' => 'قلقيلية', 'country_id' => '9'],
            ['en' => 'Jericho', 'ar' => 'أريحا', 'country_id' => '9'],

            // Iraq
            ['en' => 'Baghdad', 'ar' => 'بغداد', 'country_id' => '10'],
            ['en' => 'Basra', 'ar' => 'البصرة', 'country_id' => '10'],
            ['en' => 'Mosul', 'ar' => 'الموصل', 'country_id' => '10'],
            ['en' => 'Erbil', 'ar' => 'أربيل', 'country_id' => '10'],
            ['en' => 'Najaf', 'ar' => 'النجف', 'country_id' => '10'],
            ['en' => 'Karbala', 'ar' => 'كربلاء', 'country_id' => '10'],
            ['en' => 'Sulaymaniyah', 'ar' => 'السليمانية', 'country_id' => '10'],
            ['en' => 'Kirkuk', 'ar' => 'كركوك', 'country_id' => '10'],
            ['en' => 'Nasiriyah', 'ar' => 'الناصرية', 'country_id' => '10'],
            ['en' => 'Amara', 'ar' => 'العمارة', 'country_id' => '10'],

            // Tunisia
            ['en' => 'Tunis', 'ar' => 'تونس', 'country_id' => '11'],
            ['en' => 'Sfax', 'ar' => 'صفاقس', 'country_id' => '11'],
            ['en' => 'Sousse', 'ar' => 'سوسة', 'country_id' => '11'],
            ['en' => 'Kairouan', 'ar' => 'القيروان', 'country_id' => '11'],
            ['en' => 'Bizerte', 'ar' => 'بنزرت', 'country_id' => '11'],
            ['en' => 'Gabès', 'ar' => 'قابس', 'country_id' => '11'],
            ['en' => 'Ariana', 'ar' => 'أريانة', 'country_id' => '11'],
            ['en' => 'Gafsa', 'ar' => 'قفصة', 'country_id' => '11'],
            ['en' => 'Monastir', 'ar' => 'المنستير', 'country_id' => '11'],
            ['en' => 'Mahdia', 'ar' => 'المهدية', 'country_id' => '11'],

            // Algeria
            ['en' => 'Algiers', 'ar' => 'الجزائر', 'country_id' => '12'],
            ['en' => 'Oran', 'ar' => 'وهران', 'country_id' => '12'],
            ['en' => 'Constantine', 'ar' => 'قسنطينة', 'country_id' => '12'],
            ['en' => 'Annaba', 'ar' => 'عنابة', 'country_id' => '12'],
            ['en' => 'Blida', 'ar' => 'البليدة', 'country_id' => '12'],
            ['en' => 'Batna', 'ar' => 'باتنة', 'country_id' => '12'],
            ['en' => 'Djelfa', 'ar' => 'الجلفة', 'country_id' => '12'],
            ['en' => 'Sétif', 'ar' => 'سطيف', 'country_id' => '12'],
            ['en' => 'Sidi Bel Abbès', 'ar' => 'سيدي بلعباس', 'country_id' => '12'],
            ['en' => 'Biskra', 'ar' => 'بسكرة', 'country_id' => '12'],

            // Morocco
            ['en' => 'Casablanca', 'ar' => 'الدار البيضاء', 'country_id' => '13'],
            ['en' => 'Rabat', 'ar' => 'الرباط', 'country_id' => '13'],
            ['en' => 'Fes', 'ar' => 'فاس', 'country_id' => '13'],
            ['en' => 'Tangier', 'ar' => 'طنجة', 'country_id' => '13'],
            ['en' => 'Marrakesh', 'ar' => 'مراكش', 'country_id' => '13'],
            ['en' => 'Salé', 'ar' => 'سلا', 'country_id' => '13'],
            ['en' => 'Meknes', 'ar' => 'مكناس', 'country_id' => '13'],
            ['en' => 'Oujda', 'ar' => 'وجدة', 'country_id' => '13'],
            ['en' => 'Kenitra', 'ar' => 'القنيطرة', 'country_id' => '13'],
            ['en' => 'Agadir', 'ar' => 'أكادير', 'country_id' => '13'],

            // Sudan
            ['en' => 'Khartoum', 'ar' => 'الخرطوم', 'country_id' => '14'],
            ['en' => 'Omdurman', 'ar' => 'أم درمان', 'country_id' => '14'],
            ['en' => 'Port Sudan', 'ar' => 'بورتسودان', 'country_id' => '14'],
            ['en' => 'Kassala', 'ar' => 'كسلا', 'country_id' => '14'],
            ['en' => 'Al-Ubayyid', 'ar' => 'الأبيض', 'country_id' => '14'],
            ['en' => 'Nyala', 'ar' => 'نيالا', 'country_id' => '14'],
            ['en' => 'Wad Madani', 'ar' => 'ود مدني', 'country_id' => '14'],
            ['en' => 'Al-Fashir', 'ar' => 'الفاشر', 'country_id' => '14'],
            ['en' => 'Geneina', 'ar' => 'الجنينة', 'country_id' => '14'],
            ['en' => 'Singa', 'ar' => 'سنجة', 'country_id' => '14'],

            // Bahrain
            ['en' => 'Manama', 'ar' => 'المنامة', 'country_id' => '15'],
            ['en' => 'Muharraq', 'ar' => 'المحرق', 'country_id' => '15'],
            ['en' => 'Riffa', 'ar' => 'الرفاع', 'country_id' => '15'],
            ['en' => 'Hamad Town', 'ar' => 'مدينة حمد', 'country_id' => '15'],
            ['en' => 'A\'ali', 'ar' => 'عالي', 'country_id' => '15'],
            ['en' => 'Isa Town', 'ar' => 'مدينة عيسى', 'country_id' => '15'],
            ['en' => 'Sitra', 'ar' => 'سترة', 'country_id' => '15'],
            ['en' => 'Budaiya', 'ar' => 'البديع', 'country_id' => '15'],

            // Oman
            ['en' => 'Muscat', 'ar' => 'مسقط', 'country_id' => '16'],
            ['en' => 'Seeb', 'ar' => 'السيب', 'country_id' => '16'],
            ['en' => 'Salalah', 'ar' => 'صلالة', 'country_id' => '16'],
            ['en' => 'Bawshar', 'ar' => 'بوشر', 'country_id' => '16'],
            ['en' => 'Sohar', 'ar' => 'صحار', 'country_id' => '16'],
            ['en' => 'Sur', 'ar' => 'صور', 'country_id' => '16'],
            ['en' => 'Nizwa', 'ar' => 'نزوى', 'country_id' => '16'],
            ['en' => 'Ibri', 'ar' => 'عبري', 'country_id' => '16'],
            ['en' => 'Rustaq', 'ar' => 'الرستاق', 'country_id' => '16'],
            ['en' => 'Barka', 'ar' => 'بركاء', 'country_id' => '16'],

            // Libya
            ['en' => 'Tripoli', 'ar' => 'طرابلس', 'country_id' => '17'],
            ['en' => 'Benghazi', 'ar' => 'بنغازي', 'country_id' => '17'],
            ['en' => 'Misrata', 'ar' => 'مصراتة', 'country_id' => '17'],
            ['en' => 'Bayda', 'ar' => 'البيضاء', 'country_id' => '17'],
            ['en' => 'Zawiya', 'ar' => 'الزاوية', 'country_id' => '17'],
            ['en' => 'Ajdabiya', 'ar' => 'أجدابيا', 'country_id' => '17'],
            ['en' => 'Tobruk', 'ar' => 'طبرق', 'country_id' => '17'],
            ['en' => 'Sabha', 'ar' => 'سبها', 'country_id' => '17'],
            ['en' => 'Derna', 'ar' => 'درنة', 'country_id' => '17'],
            ['en' => 'Gharyan', 'ar' => 'غريان', 'country_id' => '17'],

            // Yemen
            ['en' => 'Sana\'a', 'ar' => 'صنعاء', 'country_id' => '18'],
            ['en' => 'Aden', 'ar' => 'عدن', 'country_id' => '18'],
            ['en' => 'Taiz', 'ar' => 'تعز', 'country_id' => '18'],
            ['en' => 'Al Hudaydah', 'ar' => 'الحديدة', 'country_id' => '18'],
            ['en' => 'Ibb', 'ar' => 'إب', 'country_id' => '18'],
            ['en' => 'Dhamar', 'ar' => 'ذمار', 'country_id' => '18'],
            ['en' => 'Al-Mukalla', 'ar' => 'المكلا', 'country_id' => '18'],
            ['en' => 'Sayyan', 'ar' => 'سيان', 'country_id' => '18'],
            ['en' => 'Zinjibar', 'ar' => 'زنجبار', 'country_id' => '18'],
            ['en' => 'Hajjah', 'ar' => 'حجة', 'country_id' => '18'],
        ];

        foreach($cities as $city)
        {
            City::create([
                'name'=>[
                    'en' => $city['en'],
                    'ar' => $city['ar']
                ],
                'country_id' => $city['country_id']
            ]);
        }
    }
}
