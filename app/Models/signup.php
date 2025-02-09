<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class signup extends Model
{
    use HasFactory;
    protected $table="core1_applicant";

  protected $fillable=[
    'applicant_id',
  'firstname',
    'lastname',
    'middlename',
    'civil_status',
    'address',
    'email',
    'contact',
    'age',
    'resume',
    'image',
    'status',
    'gender',
    'applicant_code',
    'position',];
}
