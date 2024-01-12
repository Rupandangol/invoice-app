<?php
namespace App\Helper;

use App\Models\Invoice;
use App\Models\User;

class CounterHelper{
    public function homepageCounters() {
        $data['admin_count']=User::where('is_admin',1)->count();
        $data['user_count']=User::where('is_admin',0)->count();
        $data['invoice_paid_count']=Invoice::where('status','paid')->count();
        $data['invoice_draft_count']=Invoice::where('status','draft')->count();
        $data['invoice_sent_count']=Invoice::where('status','sent')->count();
        return $data;
    }
}