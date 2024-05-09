<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publication';

    protected $fillable = [
        'Pb_type',
        'Pb_authors',
        'Pb_date',
        'Pb_DOI',
        'Pb_abstract'
    ];
}
