<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users =[
                [
                    'div_name' => 'ဗဟိုစာပေးစာယူဌာန'
                ],
                [
                    'div_name' => 'စီမံရေးနှင့် ငွေစာရင်းဌာနခွဲ'
                ],
                [
                    'div_name' => 'ကုမ္ပဏီရေးရာဌာနခွဲ'
                ],
                [
                    'div_name' => 'လူ့စွမ်းအားအရင်းအမြစ်ဖွံ့ဖြိုးရေးနှင့် သုတေသနဌာနခွဲ'
                ],
                [
                    'div_name' => 'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၁'
                ],
                [
                    'div_name' => 'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၂'
                ],
                [
                    'div_name' => 'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၃'
                ],
                [
                    'div_name' => 'ရင်းနှီးမြှုပ်နှံမှုဌာနခွဲ-၄'
                ],
                [
                    'div_name' => 'ရင်းနှီးမြှုပ်နှံမှုလုပ်ငန်းများကြီးကြပ်ရေးဌာနခွဲ'
                ],
                [
                    'div_name' => 'ရင်းနှီးမြှုပ်နှံမှုမြှင့်တင်ရေးဌာနခွဲ'
                ],
                [
                    'div_name' => 'စီမံကိန်းနှင့် စာရင်းအင်းဌာနခွဲ'
                ],
                [
                    'div_name' => 'မူဝါဒနှင့်ဥပဒေဌာနခွဲ'
                ],
                [
                    'div_name' => 'ဒုညွှန်ချုပ်-၁ ရုံး'
                ],
                [
                    'div_name' => 'ဒုညွှန်ချုပ်-၂ ရုံး'
                ],
                [
                    'div_name' => 'ဒုညွှန်ချုပ်-၃ ရုံး'
                ],
                [
                    'div_name' => 'ဒုညွှန်ချုပ်-၄ ရုံး'
                ],
                [
                    'div_name' => 'ညွှန်ချုပ်ရုံး'
                ]
        ];
        
        DB::table('divisions')->insert($users);
    
    }
}
