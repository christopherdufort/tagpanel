<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feeds';
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
}
