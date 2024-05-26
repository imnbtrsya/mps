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
        'E_Email',
        'E_Position',
        'E_Workplace',
        'E_Qualification',
        'E_Photo',
        'E_CategoryExpertise',
        'E_GroupExpertise',
        'E_AreaExpertise',
        'E_ResearchTitle',
        'E_DurationStart',
        'E_DurationEnd',
        'E_Agent',
        'E_Role',
        'E_Cost',
        'E_Status',
        'E_PublicationTitle',
        'E_Authors',
        'E_PublicationDate',
        'E_Source',
        'E_Volume',
        'E_Pages',
        'E_Publisher',
        'E_Link'
    ];
}
