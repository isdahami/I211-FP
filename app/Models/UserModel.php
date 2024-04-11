<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Name of the users table in the database
    protected $table = 'users'; 

    // Primary key column name
    protected $primaryKey = 'id'; 

    protected $allowedFields = ['username', 'created_at', 'updated_at', 'status']; 

    
}
