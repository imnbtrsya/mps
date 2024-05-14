<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchInformation extends Model
{
    use HasFactory;

    protected $table = 'research_information';

    protected $primaryKey = 'RI_ID';

    protected $fillable = [
        'P_ID', 
        'RI_title', 
        'RI_author', 
        'RI_abstract', 
        'RI_intro', 
        'RI_reference'
    ];
}
