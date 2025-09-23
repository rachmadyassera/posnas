<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Pendidikan ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Pangan dan Pertanian ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Inspektorat',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Komunikasi dan Informatika',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Kesehatan',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Perikanan',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Penanaman Modal dan Pelayanan Perijinan Terpadu Satu Pintu',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Koperasi, Usaha Kecil dan Menengah',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Pengendalian Penduduk dan Keluarga Berencana',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Ketenagakerjaan',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Perpustakaan dan Arsip',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Kependudukan dan Catatan Sipil',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Pemberdayaan Perempuan, Perlindungan Anak dan PMK',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Lingkungan Hidup',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Sosial',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Perumahan Rakyat dan Kawasan Permukiman',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Pekerjaan Umum',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Perhubungan',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Dinas Perdagangan dan Perindustrian',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Badan Perencanaan Pembangunan, Riset dan Inovasi Daerah ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Badan Pengelola Keuangan dan Pendapatan Daerah',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Badan Kesatuan Bangsa dan Politik ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Badan Penanggulangan Bencana Daerah',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Dewan Perwakilan Rakyat Daerah ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Satuan Polisi Pamong Praja ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Kecamatan Teluk Nibung ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Kecamatan Sei Tualang Raso ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Kecamatan Tanjungbalai Utara ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Kecamatan Datuk Bandar Timur ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Kecamatan Datuk Bandar',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Kecamatan Tanjungbalai Selatan',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Pembangunan ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Perekonomian ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Umum ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Protokol dan Komunikasi Pimpinan ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Pemerintahan ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Hukum ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Organisasi ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Kesejahteraan Rakyat ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Sekretariat Daerah Bagian Pengadaan Barang dan Jasa ',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
        DB::table('organizations')->insert([
            'id' => Str::uuid(),
            'name' => 'Rumah Sakit Umum Daerah Dr. Tengku Mansyur',
            'address' => '-',
            'longitude' => '-',
            'latitude' => '-',
        ]);
    }
}
