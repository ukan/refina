<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth_log extends Model
{
    protected $table = 'auth_logs';

    /**
     * {@inheritDoc}
     */
    
    protected $fillable = [
        'user_id','ip_address', 'login', 'logout',
    ];
}
