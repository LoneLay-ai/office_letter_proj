<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;
    protected $table = 'letters';
    protected $fillable = [
        'ledger_date',
        'letter_type_id',
        'ledger_Sno',
        'main_dispatch_id',
        'letter_no',
        'letter_date',
        'title_id',
        'description',
        'received_form_or_sent_to',
        'd_up',
        'd_down',
        'd_remark',
        'ddg_up',
        'ddg_down',
        'dg_up',
        'dg_down',
        'dg_remark',
        'case_officer',
        'remark',
    ];
}
