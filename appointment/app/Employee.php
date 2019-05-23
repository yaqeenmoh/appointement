<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 *
 * @package App
 * @property string $name
 * @property string $phone
 * @property string $email
*/
class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'phone', 'email'];
    protected $hidden = [];
    
    
    
}
