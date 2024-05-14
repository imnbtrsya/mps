<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'platinum';

    protected $primaryKey = 'P_ID';

    protected $fillable = [
            'P_Name',
            'P_IC',
            'P_Gender',
            'P_Religion',
            'P_Race',
            'P_Citizenship',
            'P_Address',
            'P_PhoneNum',
            'P_Email',
            'P_FBName',
            'P_EduLevel',
            'P_EduField',
            'P_EduInst',
            'P_Occupation',
            'P_Stud_Sponsor',
            'P_Batch',
            'P_Referral',
            'P_RefName',
            'P_RefBatch',
            'P_DOApp'
    ];
}

class Users extends Model
{
    use HasFactory;

protected $table = 'mentor';

    protected $primaryKey = 'M_ID';

    protected $fillable = [
            'M_name',
            'M_IC',
            'M_gender',
            'M_address',
            'M_phoneNum',
            'M_email'
        ];
    }
