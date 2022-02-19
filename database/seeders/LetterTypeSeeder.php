<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LetterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $users=[
                [
                    'letter_type_name' => 'Inbox'
                ],
                [
                    'letter_type_name' => 'Outbox'
                ]
            ];
            DB::table('letter_types')->insert($users);
    }
}
