<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseKey extends Model
{
    protected $fillable = ['key', 'tier', 'expiry_date','monthly_limit', 'is_active', 'status'];
    
}
