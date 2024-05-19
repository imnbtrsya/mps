<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertDomain extends Model
{
    use HasFactory;

    protected $table = 'expert_domain';

    protected $primaryKey = 'E_ID';


    protected $fillable = [
        'E_Name',
        'E_Title',
        'E_Position',
        'E_Workplace',
        'E_Qualification',
        'E_Email',
        'E_Field',
        'E_Research',
        'E_Publications'
    ];
}
