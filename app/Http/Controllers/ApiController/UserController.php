<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;

use App\User; 
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource; 
use GuzzleHttp;

use DB;
use Illuminate\Foundation\Auth\RegistersUsers; 
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Symfony\Component\HttpFoundation\Response;
  
class UserController extends Controller
{
 
  protected function ValidationResponse( array $errors)
  {
      return response()->json([
          'error' => $errors,
      ], Response::HTTP_BAD_REQUEST);
  }

    public function login(Request $request)
    {

        /**
     * Get a validator for an incoming login request.
     *
     * @param  array  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    $valid = validator($request->only( 'email', 'password' ), [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:6',
    ]);

    if ($valid->fails()) {
       return $this->ValidationResponse($valid->errors()->all());
    }
    
    $user = User::where('email', $request->email)->first();
    
    if(!is_object($user)){
        return $this->ValidationResponse(array('Email is not registered!'));
    }
    
        $client = DB::table('oauth_clients')->where('password_client', 1)->first();
        // Is this $request the same request? I mean Request $request? Then wouldn't it mess the other $request stuff? Also how did you pass it on the $request in $proxy? Wouldn't Request::create() just create a new thing?

        $authParams  = [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $request->email,
            'password'      => $request->password,
            'scope'         => ''
         ];
         $returnData = $data =  array();
         
 
        $http = new GuzzleHttp\Client;
        try {
            $response = $http->request('post',
            url('/') . '/oauth/token',
                ['form_params' => $authParams]
            );
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            return$this->ValidationResponse(['code' => $e->getCode(), 'message' => $e->getMessage()]);
        }

        $data['user_id'] = $user->id;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        

        $returnData  = json_decode((string) $response->getBody(), true);

        unset($data['password']);
        $returnData['user'] = $data;
        return response()->json([
            'data' => $returnData,
            'status' => 200
        ]);

    }
    
    public function register(Request $request)
    {
        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $request
         * @return \Illuminate\Contracts\Validation\Validator
         */
        $valid = validator($request->only('email', 'password' ), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6' 
        ]);

        if ($valid->fails()) {
            return $this->ValidationResponse($valid->errors()->all());
        }

        $data = request()->only('email', 'name', 'password' );
        
        $user = User::create([
            'name' => isset($data['name']) ? $data['name'] : $data['company'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']) 
        ]);
  
        $data['user_id'] = $user->id;   
        // And created user until here.

        $client = DB::table('oauth_clients')->where('password_client', 1)->first();

        $authParams  = [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $data['email'],
            'password'      => $data['password'],
            'scope'         => null,
         ];

        $http = new GuzzleHttp\Client;
        try {
            $response = $http->request('post',
            url('/') . '/oauth/token',
                ['form_params' => $authParams]
            );
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            return $this->ValidationResponse(['code' => $e->getCode(), 'message' => $e->getMessage()]);
        }

        $returnData = array();
        $returnData  = json_decode((string) $response->getBody(), true);
        unset($data['password']);
        $returnData['user'] = $data;
        return response()->json([
            'data' => $returnData,
            'status' => 200
        ]);

    }


}
