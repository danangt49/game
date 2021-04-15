<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Transaction;
use App\Transfer;
use App\Wallet;
use App\Money;
use App\Match;
use App\Player;
use App\Bank;
use App\User;
use App\Nominal;
use Illuminate\Support\Str;

class TransactionController extends BaseController {
    
    public function index() {
        
        $display = [
            "bank" => Bank::get(),
            "nominal" => Nominal::get()
        ];
        
        return $this->sendResponse($display, 'Pembelian X Berhasil.');
    }
    
    public function topup(Request $request) {
        
        $user = $request->user();
        
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(10000, 99999). mt_rand(10000, 99999). $characters[rand(0, strlen($characters) - 1)];
        $code = str_shuffle($pin);
        $code = "TR$code";
        
        if($request->hasFile('picture')){
            
            $ext = $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->move('public/asset/transfer/', "$code.$ext");
            $data = [
                'image'             => "$code.$ext",
                "user_id"           => $user->id,
                "code"              => $code,
                "nominal"           => $request->nominal,
                "bank"              => $request->bank,
                "catatan"           => $request->catatan,
                "kode_voucher"      => Str::random(10),
                "status_voucher"    => 0,
            ];
            
            Transfer::create($data);
            
            return $this->sendResponse($data, 'Order Voucher Berhasil.');
            
        } else {
            return $this->sendError('Order Voucher Gagal', ['message' => "Order Voucher Gagal"]);
        }
        
    }

    public function joinSolo(Request $request) {
        
        $player = new Player();
        
        $player->match_id = $request->match_id;
        $player->user_id = $request->user()->id;
        $player->gameid = $request->game_id;
        $player->in_game_name = $request->ign;
        $player->save();
        
        return $this->sendResponse("Daftar Berhasil", 'Join Match As Solo Player Berhasil.');
    }

    public function joinSoloPaid(Request $request) {
            
        $wallet = Wallet::where('user_id', $request->user()->id)->first();
        
        if($request->type == "balance") {
            $wallet->decrement('win_amount', $request->fee);
        } else {
            $money = Money::where('wallet_id', $wallet->id);
            $money->decrement($request->type. '_amount', $request->fee);
        }
        
        $player = new Player();
        
        $player->match_id = $request->match_id;
        $player->user_id = $request->user()->id;
        $player->gameid = $request->game_id;
        $player->in_game_name = $request->ign;
        $player->save();
        
        
        return $this->sendResponse('Berhasil Daftar', 'Join Match As Solo (PAID) Player Berhasil.');
    }

    public function joinDuo(Request $request) {
        
        $data;
        $userID;
        $gameIDfalse = [];
        $IDHasBeenJoined = [];
        
        for($i = 0; $i < count($request->players); $i++ ) {
            $user[$i] = User::where('game_id', $request->players[$i]['game_id'])->first();
            if($user[$i]) {
                $data[$i] = true;
                $userID[$i] = $user[$i]->id;
            } else {
                $data[$i] = false;
                $gameIDfalse[$i] = $request->players[$i]['game_id'];
            }
        }
        
        $cek;
        
        if(array_sum($data) == count($data)) {
            $cek = 'Berhasil Mendaftar Duo';
        } else {
            $cek = 'Gagal Mendaftar Player Dengan Game ID';
        }
        
        if(count($gameIDfalse) == 0) {
            $result = $cek;
            
            $cek_sudah_daftar;
            
            for($i = 0; $i < count($data); $i++ ) {
                $user2[$i] = Player::where('user_id', $userID[$i])->where('match_id', $request->match_id)->first();
                if($user2[$i]) {
                    $cek_sudah_daftar[$i] = true;
                    $IDHasBeenJoined[$i] = $request->players[$i]['game_id'];
                } else {
                    $cek_sudah_daftar[$i] = false;
                }
            }
        
            if(!array_sum($cek_sudah_daftar) == !count($cek_sudah_daftar)) {
                $result = 'Gagal Join Match Karena Player '. implode(", ",$IDHasBeenJoined) . ' Sudah Terdaftar Dalam Match Ini';
                
                return $this->sendResponseFailed($result, 'Join Match As Duo Player Gagal.');
            } else {
                
                for($i = 0; $i < count($request->players); $i++ ) {
                    $player[$i] = new Player();
                    $player[$i]->match_id = $request->match_id;
                    $player[$i]->user_id = $userID[$i];
                    $player[$i]->gameid = $request->game_id;
                    $player[$i]->in_game_name = $request->players[$i]['ign'];
                    $player[$i]->team = $request->team_name;
                    $player[$i]->save();
                }
                
                return $this->sendResponse($result, 'Join Match As Duo Player Berhasil.');
            }
        
        } else {
            $result = $cek .' '. implode(", ",$gameIDfalse) . ' Karena Tidak Ditemukan';
        
            return $this->sendResponseFailed($result, 'Join Match As Duo Player Gagal.');
        }
    }
    
    public function joinDuoPaid(Request $request) {
        
        $data;
        $userID;
        $gameIDfalse = [];
        $tokenEnuf;
        $gameIDfalseLowBalance = [];
        $IDHasBeenJoined = [];
        
        for($i = 0; $i < count($request->players); $i++ ) {
            $user[$i] = User::where('game_id', $request->players[$i]['game_id'])->first();
            if($user[$i]) {
                $data[$i] = true;
                $userID[$i] = $user[$i]->id;
                $cek_token[$i] = Wallet::where('user_id', $user[$i]->id)->first();
                $tokenEnuf[$i] = $cek_token[$i]->win_amount >= $request->fee ? true : false;
                $gameIDfalseLowBalance[$i] = $cek_token[$i]->win_amount >= $request->fee ? null : $request->players[$i]['game_id'];
            } else {
                $data[$i] = false;
                $gameIDfalse[$i] = $request->players[$i]['game_id'];
            }
        }
        
        $cek;
        
        if(array_sum($data) == count($data)) {
            $cek = 'Berhasil Mendaftar Duo';
        } else {
            $cek = 'Gagal Mendaftar Player Dengan Game ID';
        }
        
        // JIKA ID DITEMUKAN
        if(count($gameIDfalse) == 0) {
            
            // CEK TOKEN CUKUP ATAU TIDAK
            
            $cek;
            
            if(array_sum($data) == count($data)) {
                if(array_sum($tokenEnuf) == count($tokenEnuf)) {
                    
            
                    $cek_sudah_daftar;
                    
                    for($i = 0; $i < count($data); $i++ ) {
                        $user2[$i] = Player::where('user_id', $userID[$i])->where('match_id', $request->match_id)->first();
                        if($user2[$i]) {
                            $cek_sudah_daftar[$i] = true;
                            $IDHasBeenJoined[$i] = $request->players[$i]['game_id'];
                        } else {
                            $cek_sudah_daftar[$i] = false;
                        }
                    }
                    
                    if(!array_sum($cek_sudah_daftar) == !count($cek_sudah_daftar)) {
                        $result = 'Gagal Join Match Karena Player '. implode(", ",$IDHasBeenJoined) . ' Sudah Terdaftar Dalam Match Ini';
                        
                        return $this->sendResponseFailed($result, 'Join Match As Duo Player Gagal.');
                    } else {
                        
                        for($i = 0; $i < count($request->players); $i++ ) {
                            $player[$i] = new Player();
                            $player[$i]->match_id = $request->match_id;
                            $player[$i]->user_id = $userID[$i];
                            $player[$i]->gameid = $request->game_id;
                            $player[$i]->in_game_name = $request->players[$i]['ign'];
                            $player[$i]->team = $request->team_name;
                            $player[$i]->save();
                
                            $wallet = Wallet::where('user_id', $userID[$i])->first();
                            
                            if($request->type == "balance") {
                                $wallet->decrement('win_amount', $request->fee);
                            } else {
                                $money = Money::where('wallet_id', $wallet->id);
                                $money->decrement($request->type. '_amount', $request->fee);
                            }
                        }
                        
                        $cek = 'Berhasil Mendaftar Duo';
                        
                        return $this->sendResponse($cek, 'Join Match As Duo Player Berhasil.');
                    }
                    
                } else {
                    $cek = implode(" ",$gameIDfalseLowBalance). ' Tidak Mempunyai Cukup Balance';
                    return $this->sendResponseFailed($cek, 'Join Match As Duo (Paid) Player Gagal.');
                }
        
            } else {
                $cek = 'Gagal Mendaftar Player Dengan Game ID';
        
                return $this->sendResponseFailed($cek, 'Join Match As Duo (Paid) Player Gagal.');
            }
            
        } else {
            $result = $cek .' '. implode(", ",$gameIDfalse) . ' Karena Tidak Ditemukan';
        
            return $this->sendResponseFailed($result, 'Join Match As Duo (Paid) Player Gagal.');
        }
    }

    public function joinSquad(Request $request) {
        
        $data;
        $userID;
        $gameIDfalse = [];
        $IDHasBeenJoined = [];
        
        for($i = 0; $i < count($request->players); $i++ ) {
            $user[$i] = User::where('game_id', $request->players[$i]['game_id'])->first();
            if($user[$i]) {
                $data[$i] = true;
                $userID[$i] = $user[$i]->id;
            } else {
                $data[$i] = false;
                $gameIDfalse[$i] = $request->players[$i]['game_id'];
            }
        }
        
        $cek;
        
        if(array_sum($data) == count($data)) {
            $cek = 'Berhasil Mendaftar Squad';
        } else {
            $cek = 'Gagal Mendaftar Player Dengan Game ID';
        }
        
        if(count($gameIDfalse) == 0) {
            $result = $cek;
            
            $cek_sudah_daftar;
            
            for($i = 0; $i < count($data); $i++ ) {
                $user2[$i] = Player::where('user_id', $userID[$i])->where('match_id', $request->match_id)->first();
                if($user2[$i]) {
                    $cek_sudah_daftar[$i] = true;
                    $IDHasBeenJoined[$i] = $request->players[$i]['game_id'];
                } else {
                    $cek_sudah_daftar[$i] = false;
                }
            }
            
            if(!array_sum($cek_sudah_daftar) == !count($cek_sudah_daftar)) {
                $result = 'Gagal Join Match Karena Player '. implode(", ",$IDHasBeenJoined) . ' Sudah Terdaftar Dalam Match Ini';
                
                return $this->sendResponseFailed($result, 'Join Match As Duo Player Gagal.');
            } else {
                
                for($i = 0; $i < count($request->players); $i++ ) {
                    $player[$i] = new Player();
                    $player[$i]->match_id = $request->match_id;
                    $player[$i]->user_id = $userID[$i];
                    $player[$i]->gameid = $request->game_id;
                    $player[$i]->in_game_name = $request->players[$i]['ign'];
                    $player[$i]->team = $request->team_name;
                    $player[$i]->save();
                }
            
                return $this->sendResponse($result, 'Join Match As Duo Player Berhasil.');
            }
            
            
        } else {
            $result = $cek .' '. implode(", ",$gameIDfalse) . ' Karena Tidak Ditemukan';
        
            return $this->sendResponseFailed($result, 'Join Match As Duo Player Gagal.');
        }
    }
    
    public function joinSquadPaid(Request $request) {
        
        $data;
        $userID;
        $gameIDfalse = [];
        $tokenEnuf;
        $gameIDfalseLowBalance = [];
        $IDHasBeenJoined = [];
        
        for($i = 0; $i < count($request->players); $i++ ) {
            $user[$i] = User::where('game_id', $request->players[$i]['game_id'])->first();
            if($user[$i]) {
                $data[$i] = true;
                $userID[$i] = $user[$i]->id;
                $cek_token[$i] = Wallet::where('user_id', $user[$i]->id)->first();
                $tokenEnuf[$i] = $cek_token[$i]->win_amount >= $request->fee ? true : false;
                $gameIDfalseLowBalance[$i] = $cek_token[$i]->win_amount >= $request->fee ? '' : $request->players[$i]['game_id'];
            } else {
                $data[$i] = false;
                $gameIDfalse[$i] = $request->players[$i]['game_id'];
            }
        }
        
        $cek;
        
        if(array_sum($data) == count($data)) {
            $cek = 'Berhasil Mendaftar Duo';
        } else {
            $cek = 'Gagal Mendaftar Player Dengan Game ID';
        }
        
        // JIKA ID DITEMUKAN
        if(count($gameIDfalse) == 0) {
            
            // CEK TOKEN CUKUP ATAU TIDAK
            
            $cek;
            
            if(array_sum($data) == count($data)) {
                if(array_sum($tokenEnuf) == count($tokenEnuf)) {
            
                    $cek_sudah_daftar;
            
                    for($i = 0; $i < count($data); $i++ ) {
                        $user2[$i] = Player::where('user_id', $userID[$i])->where('match_id', $request->match_id)->first();
                        if($user2[$i]) {
                            $cek_sudah_daftar[$i] = true;
                            $IDHasBeenJoined[$i] = $request->players[$i]['game_id'];
                        } else {
                            $cek_sudah_daftar[$i] = false;
                        }
                    }
            
                    if(!array_sum($cek_sudah_daftar) == !count($cek_sudah_daftar)) {
                        $result = 'Gagal Join Match Karena Player '. implode(", ",$IDHasBeenJoined) . ' Sudah Terdaftar Dalam Match Ini';
                        
                        return $this->sendResponseFailed($result, 'Join Match As Duo Player Gagal.');
                    } else {
            
                        for($i = 0; $i < count($request->players); $i++ ) {
                            $player[$i] = new Player();
                            $player[$i]->match_id = $request->match_id;
                            $player[$i]->user_id = $userID[$i];
                            $player[$i]->gameid = $request->game_id;
                            $player[$i]->in_game_name = $request->players[$i]['ign'];
                            $player[$i]->team = $request->team_name;
                            $player[$i]->save();
                
                            $wallet = Wallet::where('user_id', $userID[$i])->first();
                            
                            if($request->type == "balance") {
                                $wallet->decrement('win_amount', $request->fee);
                            } else {
                                $money = Money::where('wallet_id', $wallet->id);
                                $money->decrement($request->type. '_amount', $request->fee);
                            }
                        }
                        
                        $cek = 'Berhasil Mendaftar Squad (Paid) ';
                        
                        return $this->sendResponse($cek, 'Join Match As Squad (Paid) Player Berhasil.');
                    }
                } else {
                    $cek = implode(" ",$gameIDfalseLowBalance). ' Tidak Mempunyai Cukup Balance';
                    return $this->sendResponseFailed($cek, 'Join Match As Duo (Paid) Player Gagal.');
                }
        
            } else {
                $cek = 'Gagal Mendaftar Player Dengan Game ID';
        
                return $this->sendResponseFailed($cek, 'Join Match As Duo (Paid) Player Gagal.');
            }
            
        } else {
            $result = $cek .' '. implode(", ",$gameIDfalse) . ' Karena Tidak Ditemukan';
        
            return $this->sendResponseFailed($result, 'Join Match As Duo (Paid) Player Gagal.');
        }
    }
    
}
