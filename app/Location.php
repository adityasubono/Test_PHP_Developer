<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static insert(array[] $array)
 * @method static create(string[] $array, string[] $array1, string[] $array2, string[] $array3)
 * @method static where(string $string, $id)
 */
class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'code',
        'name',
    ];

    public function r_employee() {
        return $this->belongsTo('App\Employee', 'location_code');
    }

}
