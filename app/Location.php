<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * @package App
 */
class Location extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';
    /**
     * Indicates to the model what the primary key of the associated table is.
     *
     * @var bool
     */
    protected $primaryKey = "id";
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'city_name', 'province_name', 'country_name'];
}
