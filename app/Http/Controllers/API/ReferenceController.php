<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Reference;
use App\User;

class ReferenceController extends BaseController {
    
    public function index(Request $request) {
        $user = $request->user();
        $ref = Reference::select('users.id', 'users.username', 'users.game_id', 'users.score', 'references.created_at')->rightjoin('users', 'users.id', 'references.user_id')->where('references.reference_id', $user->id)->get();
        $data = [
            "referense" => $ref
        ];
        
        return $this->sendResponse($data, 'Reference successfully.');
    }
}