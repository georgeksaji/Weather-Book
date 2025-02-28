<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WbCity extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the default 'wb_cities'
    protected $table = 'wb_cities';

    // Specify fillable attributes for mass assignment
    protected $fillable = ['cityname', 'city_country', 'userid'];

    // Define the relationship with WbUser
    public function user()
    {
        return $this->belongsTo(WbUser::class, 'userid');
    }
}
