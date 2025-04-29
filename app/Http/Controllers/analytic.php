<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class analytic extends Controller
{
        public function index()
  {


$months = [
    1 => "January", 2 => "February", 3 => "March", 4 => "April",
    5 => "May", 6 => "June", 7 => "July", 8 => "August",
    9 => "September", 10 => "October", 11 => "November", 12 => "December"
];
$monthlyReports = DB::table('core1_applicant_apply')
    ->select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(*) as total_applicants')
    )
    ->where('status', 'Qualified') // <-- Added condition to filter only 'Qualified' applicants
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->get()
    ->keyBy('month')
    ->toArray();


// Fill missing months with zero applicants
$formattedData = [];
foreach ($months as $num => $name) {
    $formattedData[] = [
        'month' => $name,
        'total_applicants' => isset($monthlyReports[$num]) ? $monthlyReports[$num]->total_applicants : 0
    ];
}



///dd($monthlyReports);
   return view('content.core.analytics-view',compact('formattedData'));

}
}
