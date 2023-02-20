<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'subject',
        'notes',
        'type_contact',
    ];

    const BLOGCONTACT = 1;
    const FOOTERCONTACT = 2;
    const PRODUCTCONTACT = 3;
    const PRODUCTDELERISCONTACT = 4;
    const CONTACTUSCONTACT = 5;
}
