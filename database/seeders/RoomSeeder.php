<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create(['room_number'=>'101','type'=>'Single','price'=>100]);
        Room::create(['room_number'=>'102','type'=>'Double','price'=>150]);
        Room::create(['room_number'=>'103','type'=>'Suite','price'=>250]);
    }
}