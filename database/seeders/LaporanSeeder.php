<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dangerous_accounts')->insert([
            'ml_id' => '191886092',
            'server_id' => '2984',
            'pelaku_nickname' => '081240181551',
            'korban_nickname' => '085845571344',
            'tanggal_kejadian' => '2023-04-16',
            'bukti_file_path' => '[]',
            'header_picture_path' => '',
            'kronologi' => 'Rekber no reff di hackback',
        ]);
    }
}
