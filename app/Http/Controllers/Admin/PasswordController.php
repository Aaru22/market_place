<?php
/**
   * Password Class
   *
   * @package    Laravel
   * @subpackage Controller
   * @author     Karthiyayini <karthiyayini.a@optisolbusiness.com>
   */


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use App\Http\Models\Users;
use App\Http\Models\PasswordResets;
use Redirect;
use Validator;
use Session;


class PasswordController extends Controller
{

	use Helpers;

	public function _construct()
	{


	}


	/**
       * 
       * Forgot password form request
       *
       * @return array
       */

	public function postForgotPassword(Request $request) {
		$data     = $request->all();
		$response = $this->api->post('/api/forgotPasswordCheck', $data);		
		if(isset($response['status']) && $response['status']) {
			return Redirect::to('/forgotpassword')->with('flash_success', $response['message']);
		} else {
			return Redirect::to('/forgotpassword')->with('flash_notice',$response['message']);
		}
	}

	/**
       * 
       * Reset password form view
       *
       * @return array
       */

	public function resetPassword($token,$email) {
		if(!empty($token) && !empty($email)) {
			$confirm_code = PasswordResets::where(['token'=>$token,'email'=>$email])->first();			
			if($confirm_code) {
				$data = ['email'=>$email,'token'=>$token];
				return view('forgotpassword.reset')->with($data);
			} else {
				return Redirect::to('/forgotpassword')->with('flash_notice', 'Reset password link has been expired!');								
			}		
		} 
	}

	/**
       * 
       * Reset password form request
       *
       * @return array
       */


	public function postResetPassword(Request $request) {
		$data     = $request->all();		
		$response = $this->api->post('/api/resetPasswordCheck', $data);
		if(isset($response['status']) && $response['status']) {
			return Redirect::to('/login')->with('flash_success', $response['message']);
		} else {
			return Redirect::back()->with('flash_notice', $response['message'])->withInput($data);
		}
	}

	

	

}
