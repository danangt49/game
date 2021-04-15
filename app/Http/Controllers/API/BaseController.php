<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class BaseController extends Controller {
    
  public function sendResponse($result, $message) {
      $response = [
        'success' => true,
        'data'    => $result,
        'message' => $message,
      ];

      return response()->json($response, 200);
  }
    
  public function sendResponseFailed($result, $message) {
      $response = [
        'success' => false,
        'data'    => $result,
        'message' => $message,
      ];

      return response()->json($response, 200);
  }
  
  public function sendError($error, $errorMessages = [], $code = 404) {
    	$response = [
          'success' => false,
          'message' => $error,
      ];

      if(!empty($errorMessages)){
          $response['data'] = $errorMessages;
      }

      return response()->json($response, $code);
  }
  
  public function sendErrorInputNotValid($error, $errorMessages = [], $code = 422) {
    	$response = [
          'success' => false,
          'message' => $error,
      ];

      if(!empty($errorMessages)){
          $response['data'] = $errorMessages;
      }

      return response()->json($response, $code);
  }
}
