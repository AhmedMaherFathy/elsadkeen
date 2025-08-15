<?php

namespace Database\Seeders;

use App\Models\Physique;
use App\Models\SkinColor;
use App\Models\Qualification;
use Illuminate\Database\Seeder;
use App\Models\FinancialSituation;
use App\Models\HealthCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SelectMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FinancialSituation::create([
            'name' => [
                    'en' => 'little',
                    'ar' => 'قليل',
                ]
        ]);
        FinancialSituation::create([
            'name' => [
                    'en' => 'middle',
                    'ar' => 'متوسط',
                ]
        ]);
        FinancialSituation::create([
            'name' => [
                    'en' => 'rich',
                    'ar' => 'غنى',
                ]
        ]);

        SkinColor::create([
            'name' => [
                    'en' => 'White',
                    'ar' => 'ابيض',
                ]
        ]);

        SkinColor::create([
            'name' => [
                    'en' => 'Wheatish and brown',
                    'ar' => 'حنطى مائل للسمار',
                ]
        ]);

        SkinColor::create([
            'name' => [
                    'en' => 'wheatish white',
                    'ar' => 'حنطى مائل للابيض',
                ]
        ]);

        SkinColor::create([
            'name' => [
                    'en' => 'light brown',
                    'ar' => 'اسمر فاتح',
                ]
        ]);

        Physique::create([
            'name' => [
                    'en' => 'slim',
                    'ar' => 'نحيف',
                ]
            ]);

        Physique::create([
            'name' => [
                    'en' => 'Athletic build',
                    'ar' => 'قوام رياضى',
                ]
            ]);

            Qualification::create([
            'name' => [
                    'en' => 'Preparatory study',
                    'ar' => 'دراسه اعداديه',
                ]
            ]);

            Qualification::create([
                'name' => [
                        'en' => 'High school',
                        'ar' => 'دراسه ثانويه',
                    ]
            ]);
            
            HealthCondition::create([
                'name' => [
                        'en' => 'Good',
                        'ar' => 'جيده',
                    ]
            ]);
            HealthCondition::create([
                'name' => [
                        'en' => 'disability',
                        'ar' => 'اعاقه',
                    ]
            ]);

    }
}
