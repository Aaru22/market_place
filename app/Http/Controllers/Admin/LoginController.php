<?php
/**
   * Admin Login Class
   *
   * @package    Laravel
   * @subpackage Controller
   * @author     Karthiyayini <karthiyayini.a@optisolbusiness.com>
   */


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Redirect;

class LoginController extends Controller
{

	use Helpers;

	public function _construct()
	{

		
	}


	/**
       * 
       * Login form request
       *
       * @return array
       */

	public function postLogin(Request $request)
	{
		$data     = $request->all();   
		$response = $this->api->post('/api/loginCheck',$data);
		if(isset($response['status']) && $response['status']){
			return Redirect::to('admin/dashboard');		 
		} else {
			return Redirect::to('admin/login')->with('flash_notice', $response['message']);
		}

	}

}
