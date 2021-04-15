<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Game;
use App\Match;
use App\Matches;
use App\User;
use App\Tournament;
use Yajra\DataTables\Facades\DataTables;

class TournamentController extends Controller
{
    public function index()
    {
        return view('admin.tournament.home');
    }

    public function json()
    {
        $data  = Tournament::join('games', 'tournaments.game_id', 'games.id')
            ->join('matches', 'tournaments.match_id', 'matches.id')
            ->join('users', 'tournaments.user_id', 'users.id')
            ->select('tournaments.id', 'users.name', 'games.title', 'matches.match_name', 'matches.mode')
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
                    <a class="btn btn-warning btn-xs" href="'.url('admin/tournament/' . $row->id . '').'"><i class="fas fa-tools"></i></a>
                    <button data-id="' . $row->id . '"class="btn-xs btn btn-danger delete"><i class="fas fa-trash-restore"></i></button>
                    ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function edit($id)
    {
        $match     = Matches::get();
        $user      = User::get();
        $game      = Game::get();
        $tournament = Tournament::find($id);
        return view('admin.tournament.edit', compact('match', 'user', 'game', 'tournament'));
    }

    public function update(Request $request, $id)
    {

        $data_insert = [
            'match_id'      => $request->match_id,
            'user_id'       => $request->user_id,
            'game_id'        => $request->game_id,
        ];

        Game::where('id', '=', $id)->update($data_insert);
        return redirect('admin/tournament')->with('success', 'Data updated successfully');
    }


    public function destroy(Request $request)
    {
        $id              = $request['id'];
        $tournament      = Tournament::find($id);
        $tournament->delete();
        return redirect('admin/tournament')->with('success', 'Data Deleted Successfully');
    }
}
