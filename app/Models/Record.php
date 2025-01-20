<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
            protected $fillable = ['id', 'date', 'supplier_id', 'vehicle_type_id', 'color', 'plate_no', 'rate', 'extendable', 'tax_type', 'no_of_days', 'delivery_date', 'delivery_time'];

            public function supplier()
            {
                return $this->belongsTo(Supplier::class);
            }
            public function vehicleType()
            {
                return $this->belongsTo(VehicleType::class);
            }
}
