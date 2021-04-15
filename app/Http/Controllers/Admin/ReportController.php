<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // public function index()
    // {
      
    //   $data = DB::select('SELECT matches.match_name, matches.kill, users.name, reports.status, reports.id FROM reports join matches on reports.match_id=matches.id JOIN users on reports.user_id=users.id ');
    //     return view('report.home',compact('data'));
    // }
    
    
    public function index(){
        $data['ff']  = Player::select('players.user_id', DB::raw('SUM(players.total) as sum'))
        ->where('players.gameid', '=', '4')
        ->groupBy('players.user_id')
        ->orderBy('sum','DESC')
        ->get();
        
        $data['pubg']  = Player::select('players.user_id', DB::raw('SUM(players.total) as sum'))
        ->where('players.gameid', '=', '2')
        ->groupBy('players.user_id')
        ->orderBy('sum', 'DESC')
        ->get();
        
        return view('admin.report.home')->with($data);
    }
}
