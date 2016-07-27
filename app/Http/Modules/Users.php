<?php 
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class Users extends Authenticatable  {



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'username','first_name','last_name','email','is_active','is_deleted','created_by','updated_by','remember_token'];

    


}