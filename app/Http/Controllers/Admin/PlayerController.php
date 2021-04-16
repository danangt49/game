<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Player;
use App\Match;
use App\User;
use App\Game;
use App\Matches;
use Yajra\DataTables\Facades\DataTables;

class PlayerController extends Controller
{
    public function index()
    {
        return view('admin.match.view');
    }

    public function json()
    {
        $data  = Player::join('matches', 'players.match_id', 'matches.id')
            ->join('users', 'players.user_id', 'users.id')
            ->select('players.gameid', 'matches.match_name', 'players.team')
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
             <a class="btn btn-warning btn-xs" href="'.url('admin/player/' . $row->id . '').'"><i class="fas fa-tools"></i></a>
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
        $player    = player::find($id);
        return view('admin.match.view.edit', compact('match', 'user', 'game', 'player'));
    }

    public function update(Request $request, $id)
    {

        $data_insert = [
            'match_id'        => $request->match_id,
            'user_id'       => $request->user_id,
            'game_id'            => $request->game_id,
        ];

        Game::where('id', '=', $id)->update($data_insert);
        return redirect('admin/player')->with('success', 'Data updated successfully');
    }


    public function destroy(Request $request)
    {
        $id          = $request['id'];
        $player      = player::find($id);
        $player->delete();
        return redirect('admin/player')->with('success', 'Data Deleted Successfully');
    }
}
