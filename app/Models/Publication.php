<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publication';

    protected $primaryKey = 'Pb_ID';

    protected $fillable = [
        'Pb_type',
        'Pb_title',
        'Pb_authors',
        'Pb_date',
        'Pb_DOI',
        'Pb_abstract',
        'Pb_file_path'
    ];
}
