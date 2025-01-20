<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Record;

class RecordsSeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction();
        try{


        // Seed the `suppliers` table
        $suppliers = [
            ['id' => 1, 'name' => 'PINDI BOYS CAR RENTAL LLC'],
            ['id' => 2, 'name' => '4MATIC CAR RENTAL'],
            ['id' => 3, 'name' => 'DREAMZ RENT A CAR LLC'],
            ['id' => 4, 'name' => 'KZ CARRIER RENT A CAR LLC'],
            ['id' => 5, 'name' => 'VENENO CAR RENTAL LLC'],
            ['id' => 6, 'name' => 'EXOTIC RIDE RENT A CAR LLC'],
            ['id' => 7, 'name' => 'NCK CAR RENTAL LLC'],
            ['id' => 8, 'name' => 'PRICE MASTER CAR RENTAL LLC'],
            ['id' => 9, 'name' => 'ORO CAR RENTAL LLC'],
            ['id' => 10, 'name' => 'ROYAL COSTA CAR RENTAL LLC'],
        ];
        DB::table('suppliers')->insert($suppliers);

        // Seed the `vehicle_types` table
        $vehicleTypes = [
            ['id' => 1, 'name' => 'SUZUKI ERTIGA'],
            ['id' => 2, 'name' => 'JAC JS6'],
            ['id' => 3, 'name' => 'LAND ROVER DEFENDER'],
            ['id' => 4, 'name' => 'BMW 420'],
            ['id' => 5, 'name' => 'CHEVROLET GROOVE'],
            ['id' => 6, 'name' => 'RANGE ROVER VOGUE'],
            ['id' => 7, 'name' => 'NISSAN PATROL'],
            ['id' => 8, 'name' => 'MERCEDES CLA 250'],
            ['id' => 9, 'name' => 'BMW 330i'],
            ['id' => 10, 'name' => 'NISSAN KICKS'],
            ['id' => 11, 'name' => 'NISSAN XTERRA'],
            ['id' => 12, 'name' => 'PORSCHE BOXTER'],
            ['id' => 13, 'name' => 'BMW X5 2022'],
            ['id' => 14, 'name' => 'GMC YUKON'],
            ['id' => 15, 'name' => 'MERCEDES E450'],
        ];
        DB::table('vehicle_types')->insert($vehicleTypes);

        // Seed the `records` table
        $records = [
            [
                'id' => 301,
                'date' => '2025-01-02',
                'supplier_id' => 1, // PINDI BOYS CAR RENTAL LLC
                'vehicle_type_id' => 1, // SUZUKI ERTIGA
                'color' => 'SILVER',
                'plate_no' => 'W 95947',
                'rate' => 175,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '5 Days',
                'delivery_date' => '2025-01-02',
                'delivery_time' => '17:00',
            ],
            [
                'id' => 302,
                'date' => '2025-01-02',
                'supplier_id' => 1, // PINDI BOYS CAR RENTAL LLC
                'vehicle_type_id' => 2, // JAC JS6
                'color' => 'BLUE',
                'plate_no' => 'N 77310',
                'rate' => 175,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '5 Days',
                'delivery_date' => '2025-01-02',
                'delivery_time' => '17:00',
            ],
            [
                'id' => 303,
                'date' => '2025-01-05',
                'supplier_id' => 2, // 4MATIC CAR RENTAL
                'vehicle_type_id' => 3, // LAND ROVER DEFENDER
                'color' => 'WHITE',
                'plate_no' => 'X 31253',
                'rate' => 600,
                'tax_type' => 'VAT',
                'no_of_days' => '5 Days',
                'delivery_date' => '2025-01-06',
                'delivery_time' => '12:00',
            ],
            [
                'id' => 304,
                'date' => '2025-01-05',
                'supplier_id' => 3, // DREAMZ RENT A CAR LLC
                'vehicle_type_id' => 4, // BMW 420
                'color' => 'BLACK',
                'plate_no' => 'CC-76705',
                'rate' => 400,
                'extendable' => 'yes',
                'tax_type' => 'VAT',
                'no_of_days' => '4 DAYS',
                'delivery_date' => '2025-01-06',
                'delivery_time' => '17:30',
            ],
            [
                'id' => 305,
                'date' => '2025-01-06',
                'supplier_id' => 4, // KZ CARRIER RENT A CAR LLC
                'vehicle_type_id' => 5, // CHEVROLET GROOVE
                'color' => 'WHITE',
                'plate_no' => 'Z 68702',
                'rate' => 130,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '5 Days',
                'delivery_date' => '2025-01-06',
                'delivery_time' => '12:00',
            ],
            [
                'id' => 306,
                'date' => '2025-01-06',
                'supplier_id' => 5, // VENENO CAR RENTAL LLC
                'vehicle_type_id' => 6, // RANGE ROVER VOGUE
                'color' => 'BLACK',
                'plate_no' => 'I-7893',
                'rate' => 1200,
                'tax_type' => 'VAT',
                'no_of_days' => '3 DAYS',
                'delivery_date' => '2025-01-06',
                'delivery_time' => '22:00',
            ],
            [
                'id' => 307,
                'date' => '2025-01-06',
                'supplier_id' => 5, // VENENO CAR RENTAL LLC
                'vehicle_type_id' => 7, // NISSAN PATROL
                'color' => 'GREY',
                'plate_no' => 'J-34554',
                'rate' => 400,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '5 Days',
                'delivery_date' => '2025-01-06',
                'delivery_time' => '16:30',
            ],
            [
                'id' => 308,
                'date' => '2025-01-06',
                'supplier_id' => 3, // DREAMZ RENT A CAR LLC
                'vehicle_type_id' => 8, // MERCEDES CLA 250
                'color' => 'BLACK',
                'plate_no' => 'X-17327',
                'rate' => 300,
                'tax_type' => 'VAT',
                'no_of_days' => '2 DAYS',
                'delivery_date' => '2025-01-07',
                'delivery_time' => '11:00',
            ],
            [
                'id' => 309,
                'date' => '2025-01-06',
                'supplier_id' => 5, // VENENO CAR RENTAL LLC
                'vehicle_type_id' => 9, // BMW 330i
                'color' => 'BLACK',
                'plate_no' => 'X-46631',
                'rate' => 300,
                'tax_type' => 'VAT',
                'no_of_days' => '5 Days',
                'delivery_date' => '2025-01-07',
                'delivery_time' => '20:30',
            ],
            [
                'id' => 310,
                'date' => '2025-01-07',
                'supplier_id' => 6, // EXOTIC RIDE RENT A CAR LLC
                'vehicle_type_id' => 10, // NISSAN KICKS
                'color' => 'SILVER',
                'plate_no' => 'R-36427',
                'rate' => 200,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '5 Days',
                'delivery_date' => '2025-01-07',
                'delivery_time' => '21:30',
            ],
            [
                'id' => 311,
                'date' => '2025-01-07',
                'supplier_id' => 6, // EXOTIC RIDE RENT A CAR LLC
                'vehicle_type_id' => 11, // NISSAN XTERRA
                'color' => 'GREY',
                'plate_no' => 'CC-24579',
                'rate' => 200,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '4 Days',
                'delivery_date' => '2025-01-08',
                'delivery_time' => '15:30',
            ],
            [
                'id' => 312,
                'date' => '2025-01-08',
                'supplier_id' => 7, // NCK CAR RENTAL LLC
                'vehicle_type_id' => 12, // PORSCHE BOXTER
                'color' => 'RED',
                'plate_no' => 'O-95867',
                'rate' => 600,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '1 DAY',
                'delivery_date' => '2025-01-08',
                'delivery_time' => '20:30',
            ],
            [
                'id' => 313,
                'date' => '2025-01-08',
                'supplier_id' => 8, // PRICE MASTER CAR RENTAL LLC
                'vehicle_type_id' => 13, // BMW X5 2022
                'color' => 'BLACK',
                'plate_no' => 'B-65248',
                'rate' => 400,
                'tax_type' => 'VAT',
                'no_of_days' => '3 DAYS',
                'delivery_date' => '2025-01-08',
                'delivery_time' => '20:00',
            ],
            [
                'id' => 314,
                'date' => '2025-01-08',
                'supplier_id' => 8, // PRICE MASTER CAR RENTAL LLC
                'vehicle_type_id' => 14, // GMC YUKON
                'color' => 'WHITE',
                'plate_no' => 'B-65248',
                'rate' => 400,
                'tax_type' => 'VAT',
                'no_of_days' => '1 DAY',
                'delivery_date' => '2025-01-08',
                'delivery_time' => '19:00',
            ],
            [
                'id' => 315,
                'date' => '2025-01-09',
                'supplier_id' => 5, // VENENO CAR RENTAL LLC
                'vehicle_type_id' => 15, // MERCEDES E450
                'color' => 'BLACK',
                'plate_no' => 'F-52638',
                'rate' => 500,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '4 DAYS',
                'delivery_date' => '2025-01-09',
                'delivery_time' => '20:00',
            ],
            [
                'id' => 316,
                'date' => '2025-01-09',
                'supplier_id' => 3, // DREAMZ RENT A CAR LLC
                'vehicle_type_id' => 8, // MERCEDES CLA 250
                'color' => 'BLACK',
                'plate_no' => 'X-17327',
                'rate' => 300,
                'tax_type' => 'VAT',
                'no_of_days' => '3 DAYS',
                'delivery_date' => '2025-01-09',
                'delivery_time' => '19:00',
            ],
            [
                'id' => 317,
                'date' => '2025-01-09',
                'supplier_id' => 9, // ORO CAR RENTAL LLC
                'vehicle_type_id' => 15, // MERCEDES E450
                'color' => 'GREY',
                'plate_no' => 'G-64527',
                'rate' => 500,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '2 DAYS',
                'delivery_date' => '2025-01-09',
                'delivery_time' => '19:30',
            ],
            [
                'id' => 318,
                'date' => '2025-01-13',
                'supplier_id' => 5, // VENENO CAR RENTAL LLC
                'vehicle_type_id' => 6, // RANGE ROVER VOGUE
                'color' => 'WHITE',
                'plate_no' => 'CC-97287',
                'rate' => 1050,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '3 DAYS',
                'delivery_date' => '2025-01-13',
                'delivery_time' => '13:30',
            ],
            $record = [
                'id' => 319,
                'date' => '2025-01-14',
                'supplier_id' => 10, // ROYAL COSTA CAR RENTAL LLC
                'vehicle_type_id' => 6,  // RANGE ROVER VOGUE
                'color' => 'WHITE',
                'plate_no' => 'CC-97287',
                'rate' => 1050,
                'tax_type' => 'INCLUDED TAX',
                'no_of_days' => '3 DAYS',
                'delivery_date' => '2025-01-16',
                'delivery_time' => '13:30',
            ],
            [
                'id' => 320,
                'date' => '2025-01-14',
                'supplier_id' => 7, // NCK CAR RENTAL LLC
                'vehicle_type_id' => 12, // PORSCHE BOXTER
                'color' => 'RED',
                'plate_no' => 'CC-24579',
                'rate' => 600,
                'tax_type' => 'VAT',
                'no_of_days' => '3 DAYS',
                'delivery_date' => '2025-01-14',
                'delivery_time' => '11:00',
            ],
            // Continue adding records for IDs 309 and onward based on the screenshot
        ];
        foreach($records as $record){
            Record::create($record);
        }
        DB::commit();
    }catch(\Exception $e){
        DB::rollBack();
        throw $e;
    }
    }
}
