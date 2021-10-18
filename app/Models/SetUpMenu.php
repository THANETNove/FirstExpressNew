<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetUpMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'rolename',
        'scripting',
        'manageusers',
        'viewusers',
        'adduser',
        'deleteuser',
        'edituser',
        'setuproles',
        'manageaccount',
        'manageinvoices',
        'manageCOD',
        'managecommissions',
        'settings',
        'viewshipping',
        'editshipping',
        'viewcommission',
        'editcommission',
        'report'
    ];
}


