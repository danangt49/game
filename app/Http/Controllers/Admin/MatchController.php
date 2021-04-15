<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Game;

use App\Matches;
use App\Player;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{

    public function index()
    {
        return view('admin.matches.home');
    }

    public function json()
    {
        $data  = Matches::join('games', 'matches.game_id', 'games.id')
            ->select('matches.id', 'games.title', 'matches.match_name', 'matches.room', 'matches.match_schedule', 'matches.players', 'matches.prize', 'matches.fee', 'matches.mode', 'matches.status')
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
                    <a class="btn btn-primary btn-xs" href="'.url('admin/matches-player/' . $row->id . '').'"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning btn-xs" href="'.url('admin/matches/' . $row->id . '').'"><i class="fas fa-tools"></i></a>
                    <button data-id="' . $row->id . '"class="btn-xs btn btn-danger delete"><i class="fas fa-trash-restore"></i></button>
                ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $data_game  = Game::get();
        return view('admin.matches.create', compact('data_game'));
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'match_name'     => 'required',
                'match_schedule' => 'required',
                'description'    => 'required',
                'kill'           => 'required',
                'fee'            => 'required',
                'maps'           => 'required',
                'players'        => 'required',
                'link'           => 'required',
                'prize'          => 'required',
            ],
            [
                'match_name.required'    => 'Must be filled !!!',
                'match_schedule.required'=> 'Must be filled !!!',
                'description.required'   => 'Must be filled !!!',
                'kill.required'          => 'Must be filled !!!',
                'fee.required'           => 'Must be filled !!!',
                'maps.required'          => 'Must be filled !!!',
                'players.required'       => 'Must be filled !!!',
                'link.required'          => 'Must be filled !!!',
                'prize.required'         => 'Must be filled !!!',
            ]
        );
        if ($request->hasFile('picture')) {
            $request->file('picture')->move('public/asset/match', $request->file('picture')->getClientOriginalName());
            $gambar     = $request->file('picture')->getClientOriginalName();
            $data_insert = [
                'game_id'               => $request->game_id,
                'match_name'            => $request->match_name,
                'slug'	                => Str::slug($request->match_name,'-'),
                'match_schedule'        => Carbon::parse($request->datepicker),
                'description'           => $request->description,
                'kill'                  => $request->kill,
                'fee'                   => $request->fee,
                'maps'                  => $request->maps,
                'players'               => $request->players,
                'link'                  => $request->link,
                'prize'                 => $request->prize,
                'picture'               => $gambar,
                'team'                  => $request->team,
                'match_type'            => $request->match_type,
                'mode'                  => $request->mode,
                'status'                => 'upcoming'
            ];
        }
        Matches::create($data_insert);
        return redirect('admin/matches')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $data_game   = Game::get();
        $matches     = Matches::find($id);
        return view('admin.matches.edit', compact('matches', 'data_game'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'picture'    => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        $imglama       = $request->picturelama;

        if ($request->file('picture')) {
            $request->file('picture')->move('public/asset/match', $request->file('picture')->getClientOriginalName());
            $gambar     = $request->file('picture')->getClientOriginalName();
            $data_insert = [
                'game_id'                => $request->game_id,
                'room'                   => $request->room,
                'room_password'          => $request->room_password,
                'match_name'             => $request->match_name,
                'slug'	                 => Str::slug($request->match_name,'-'),
                'match_schedule'         => Carbon::parse($request->match_schedule),
                'description'            => $request->description,
                'kill'                   => $request->kill,
                'fee'                    => $request->fee,
                'maps'                   => $request->maps,
                'players'                => $request->players,
                'link'                   => $request->link,
                'prize'                  => $request->prize,
                'picture'                => $gambar,
                'team'                   => $request->team,
                'match_type'             => $request->match_type,
                'mode'                   => $request->mode,
                'status'                 => $request->status,
            ];
        } else {
            $data_insert = [
                'game_id'                => $request->game_id,
                'room'                   => $request->room,
                'room_password'          => $request->room_password,
                'match_name'             => $request->match_name,
                'slug'	                 => Str::slug($request->match_name,'-'),                
                'match_schedule'         => Carbon::parse($request->match_schedule),
                'description'            => $request->description,
                'kill'                   => $request->kill,
                'fee'                    => $request->fee,
                'maps'                   => $request->maps,
                'players'                => $request->players,
                'link'                   => $request->link,
                'prize'                  => $request->prize,
                'picture'                => $imglama,
                'team'                   => $request->team,
                'match_type'             => $request->match_type,
                'mode'                   => $request->mode,
                'status'                 => $request->status,
            ];
        }
        Matches::where('id', '=', $id)->update($data_insert);
        return redirect('admin/matches')->with('success', 'Data updated successfully');
    }


    public function destroy(Request $request)
    {
        $id         = $request['id'];
        $match      = Matches::find($id);
        File::delete('public/asset/match/' . $match->picture . '');
        $match->delete();
        return redirect('admin/matches')->with('success', 'Data Deleted Successfully');
    }

    public function jsonplayer(Request $request)
    {
        $segment_id     = $request->segment(3);
        $id             = $request->id;
        $data['data_detail']    = Matches::join('games', 'matches.game_id', 'games.id')
            ->where('matches.id', $segment_id)
            ->select('matches.id', 'games.title', 'matches.match_name', 'matches.room', 'matches.kill', 'matches.match_schedule', 'matches.players', 'matches.prize', 'matches.fee', 'matches.mode', 'matches.status')
            ->get();

        $data['data']   = DB::table('players')
            ->join('matches', 'matches.id', 'players.match_id')
            ->join('users', 'users.id', 'players.user_id')
            ->select('players.id', 'matches.match_name', 'users.username', 'players.place', 'players.place_point', 'players.killed', 'players.kill_win', 'players.win_prize', 'players.bonus', 'players.total', 'players.refund')
            ->where('players.match_id', $id)
            ->orderBy('match_id')
            ->get();
        return view('admin.matches.player')->with($data);
    }

    public function jsonscore(Request $request)
    {
        $id            = $request->id;
        $data['data']  = DB::table('players')
            ->join('users', 'players.user_id', 'users.id')
            ->join('matches', 'matches.id', 'players.match_id')
            ->where('players.id', $id)
            ->select('players.id', 'players.match_id', 'matches.match_name', 'matches.kill', 'users.username', 'users.name', 'players.place', 'players.place_point', 'players.killed', 'players.kill_win', 'players.win_prize', 'players.bonus', 'players.total', 'players.refund')
            ->get();
        return view('admin.matches.detailEdit')->with($data);
    }

    public function updatescore(Request $request, $id)
    {

        $segment_id                 = $request->segment_id;
        $data = [
            'place'                 => $request->place,
            'place_point'           => $request->place_point,
            'killed'                => $request->killed,
            'kill_win'              => $request->kill_win,
            'win_prize'             => $request->win_prize,
            'bonus'                 => $request->bonus,
            'total'                 => $request->total,
            'refund'                => $request->refund
        ];

        Player::where('id', '=', $id)->update($data);
        return redirect('admin/matches-player/' . $segment_id)->with('success', 'Data updated successfully');
    }
}
