<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Activity;
use App\Game;
use App\Match;
use App\Matches;
use App\Transfer;
use App\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['user']     = User::get()->count();
        $data['match']    = Matches::get()->count();
        $data['game']     = Game::get()->count();
        $data['users']    = User::orderBy('id', 'DESC')->take(4)->get();
        $data['transfer'] = Transfer::get()->count();
        $data['activies'] = DB::table('activities')
            ->join('users', 'users.id', '=', 'activities.user_id')
            ->select('users.name', 'activities.menu_name', 'activities.description_activity')
            ->orderBY('activities.created_at', 'DESC')
            ->get();


        return view('admin.home')->with($data);
    }

    public function json()
    {
        $data = DB::table('activities')
            ->join('users', 'users.id', '=', 'activities.user_id')
            ->select('users.name', 'activities.menu_name', 'activities.description_activity')
            ->orderBY('activities.created_at', 'DESC')
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
    public function jsonaktivitas()
    {
        $total                      = DB::table('activities as a')->join('users as b', 'a.user_id', 'b.id')->orderBy('a.created_at', 'DESC')->get()->count();
        $length                     = intval($_REQUEST['length']);
        $length                     = $length < 0 ? $total : $length;
        $start                      = intval($_REQUEST['start']);
        $draw                       = intval($_REQUEST['draw']);

        $search                     = $_REQUEST['search']["value"];

        $output                     = array();
        $output['data']             = array();

        $end                        = $start + $length;
        $end                        = $end > $total ? $total : $end;

        $query                      = DB::table('activities as a')->join('users as b', 'a.user_id', 'b.id')->take($length)->skip($start)->orderBy('a.created_at', 'DESC')->get();

        if ($search != "") {
            $query                      = DB::table('activities as a')->join('users as b', 'a.user_id', 'b.id')->orWhere('menu_name', 'like', '%' . $search . '%')->take($length)->skip($start)->orderBy('a.created_at', 'DESC')->get();
            $output['recordsTotal']     = $output['recordsFiltered'] = $query->count();
        }

        $no = $start + 1;
        foreach ($query as $aktivity) {
            $output['data'][] =
                array(
                    $no,
                    $aktivity->name,
                    $aktivity->menu_name,
                    $aktivity->description_activity
                );
            $no++;
        }

        $output['draw']             = $draw;
        $output['recordsTotal']     = $total;
        $output['recordsFiltered']  = $total;

        echo json_encode($output);
    }
}
