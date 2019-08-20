<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{


    protected $fillable = ['order_no','name','address_1','district','province'];

protected $table='data';

}
