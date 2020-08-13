<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @method static create(array $all)
 * @method static where(string $string, int $id)
 */
class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'location_code',
        'birth_date'
    ];

//    public function r_location() {
//        return $this->hasMany('App\Location', 'code');
//    }

}
