<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name' => 'Federal Territories',
            'slug' => 'FederalTerritories'
        ]);

        State::create([
            'name' => 'Johor',
            'slug' => 'Johor'
        ]);

        State::create([
            'name' => 'Kedah',
            'slug' => 'Kedah'
        ]);

        State::create([
            'name' => 'Kelantan',
            'slug' => 'Kelantan'
        ]);

        State::create([
            'name' => 'Malacca',
            'slug' => 'Malacca'
        ]);

        State::create([
            'name' => 'Negeri Sembilan',
            'slug' => 'NegeriSembilan'
        ]);

        State::create([
            'name' => 'Pahang',
            'slug' => 'Pahang'
        ]);

        State::create([
            'name' => 'Penang',
            'slug' => 'Penang'
        ]);

        State::create([
            'name' => 'Perak',
            'slug' => 'Perak'
        ]);

        State::create([
            'name' => 'Perlis',
            'slug' => 'Perlis'
        ]);

        State::create([
            'name' => 'Sabah',
            'slug' => 'Sabah'
        ]);

        State::create([
            'name' => 'Sarawak',
            'slug' => 'Sarawak'
        ]);

        State::create([
            'name' => 'Selangor',
            'slug' => 'Selangor'
        ]);

        State::create([
            'name' => 'Terengganu',
            'slug' => 'Terengganu'
        ]);

        Location::create([
            'name' => 'Kuala Lumpur',
            'slug' => 'KualaLumpur',
            'state_id' => 1
        ]);

        Location::create([
            'name' => 'Seberang Perai',
            'slug' => 'SeberangPerai',
            'state_id' => 8
        ]);

        Location::create([
            'name' => 'Kajang',
            'slug' => 'Kajang',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Klang',
            'slug' => 'Klang',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Subang Jaya',
            'slug' => 'SubangJaya',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'George Town',
            'slug' => 'GeorgeTown',
            'state_id' => 8
        ]);

        Location::create([
            'name' => 'Ipoh',
            'slug' => 'Ipoh',
            'state_id' => 9
        ]);

        Location::create([
            'name' => 'Petaling Jaya',
            'slug' => 'PetalingJaya',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Selayang',
            'slug' => 'Selayang',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Shah Alam',
            'slug' => 'ShahAlam',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Iskandar Puteri',
            'slug' => 'IskandarPuteri',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Seremban',
            'slug' => 'Seremban',
            'state_id' => 6
        ]);

        Location::create([
            'name' => 'Johor Bahru',
            'slug' => 'JohorBahru',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Malacca City',
            'slug' => 'MalaccaCity',
            'state_id' => 5
        ]);

        Location::create([
            'name' => 'Ampang Jaya',
            'slug' => 'AmpangJaya',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Kota Kinabalu',
            'slug' => 'KotaKinabalu',
            'state_id' => 11
        ]);

        Location::create([
            'name' => 'Sungai Petani',
            'slug' => 'SungaiPetani',
            'state_id' => 3
        ]);

        Location::create([
            'name' => 'Kuantan',
            'slug' => 'Kuantan',
            'state_id' => 7
        ]);

        Location::create([
            'name' => 'Alor Setar',
            'slug' => 'AlorSetar',
            'state_id' => 3
        ]);

        Location::create([
            'name' => 'Tawau',
            'slug' => 'Tawau',
            'state_id' => 11
        ]);

        Location::create([
            'name' => 'Sandakan',
            'slug' => 'Sandakan',
            'state_id' => 11
        ]);

        Location::create([
            'name' => 'Kuala Terengganu',
            'slug' => 'KualaTerengganu',
            'state_id' => 14
        ]);

        Location::create([
            'name' => 'Kuching',
            'slug' => 'Kuching',
            'state_id' => 12
        ]);

        Location::create([
            'name' => 'Kota Bharu',
            'slug' => 'KotaBharu',
            'state_id' => 4
        ]);

        Location::create([
            'name' => 'Kulim',
            'slug' => 'Kulim',
            'state_id' => 3
        ]);

        Location::create([
            'name' => 'Padawan',
            'slug' => 'Padawan',
            'state_id' => 12
        ]);

        Location::create([
            'name' => 'Taiping',
            'slug' => 'Taiping',
            'state_id' => 9
        ]);

        Location::create([
            'name' => 'Miri',
            'slug' => 'Miri',
            'state_id' => 12
        ]);

        Location::create([
            'name' => 'Kulai',
            'slug' => 'Kulai',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Kangar',
            'slug' => 'Kangar',
            'state_id' => 10
        ]);

        Location::create([
            'name' => 'Kuala Langat',
            'slug' => 'KualaLangat',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Kubang Pasu',
            'slug' => 'KubangPasu',
            'state_id' => 3
        ]);

        Location::create([
            'name' => 'Manjung',
            'slug' => 'Manjung',
            'state_id' => 9
        ]);

        Location::create([
            'name' => 'Batu Pahat',
            'slug' => 'BatuPahat',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Sepang',
            'slug' => 'Sepang',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Kuala Selangor',
            'slug' => 'KualaSelangor',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Muar',
            'slug' => 'Muar',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Hulu Selangor',
            'slug' => 'HuluSelangor',
            'state_id' => 13
        ]);

        Location::create([
            'name' => 'Bintulu',
            'slug' => 'Bintulu',
            'state_id' => 12
        ]);

        Location::create([
            'name' => 'Alor Gajah',
            'slug' => 'AlorGajah',
            'state_id' => 5
        ]);

        Location::create([
            'name' => 'Keningau',
            'slug' => 'Keningau',
            'state_id' => 11
        ]);

        Location::create([
            'name' => 'Kluang',
            'slug' => 'Kluang',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Kemaman',
            'slug' => 'Kemaman',
            'state_id' => 14
        ]);

        Location::create([
            'name' => 'Sibu',
            'slug' => 'Sibu',
            'state_id' => 12
        ]);

        Location::create([
            'name' => 'Temerloh',
            'slug' => 'Temerloh',
            'state_id' => 7
        ]);

        Location::create([
            'name' => 'Dungun',
            'slug' => 'Dungun',
            'state_id' => 14
        ]);

        Location::create([
            'name' => 'Jasin',
            'slug' => 'Jasin',
            'state_id' => 5
        ]);

        Location::create([
            'name' => 'Teluk Intan',
            'slug' => 'TelukIntan',
            'state_id' => 9
        ]);

        Location::create([
            'name' => 'Kota Samarahan',
            'slug' => 'KotaSamarahan',
            'state_id' => 12
        ]);

        Location::create([
            'name' => 'Bentong',
            'slug' => 'Bentong',
            'state_id' => 7
        ]);

        Location::create([
            'name' => 'Kuala Kangsar',
            'slug' => 'KualaKangsar',
            'state_id' => 9
        ]);

        Location::create([
            'name' => 'Segamat',
            'slug' => 'Segamat',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Port Dickson',
            'slug' => 'PortDickson',
            'state_id' => 6
        ]);

        Location::create([
            'name' => 'Pontian',
            'slug' => 'Pontian',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Langkawi',
            'slug' => 'Langkawi',
            'state_id' => 3
        ]);

        Location::create([
            'name' => 'Kota Tinggi',
            'slug' => 'KotaTinggi',
            'state_id' => 2
        ]);

        Location::create([
            'name' => 'Labuan',
            'slug' => 'Labuan',
            'state_id' => 1
        ]);

        Location::create([
            'name' => 'Putrajaya',
            'slug' => 'Putrajaya',
            'state_id' => 1
        ]);

        Location::create([
            'name' => 'Jempol',
            'slug' => 'Jempol',
            'state_id' => 6
        ]);

        Location::create([
            'name' => 'Pasir Gudang',
            'slug' => 'PasirGudang',
            'state_id' => 2
        ]);
    }
}
