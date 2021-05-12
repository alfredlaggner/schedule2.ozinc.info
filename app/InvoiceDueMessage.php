<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDueMessage extends Model
{
    public function reminder(){
        return($this->hasOne(App\InvoiceDueReminder::class));
    }}
