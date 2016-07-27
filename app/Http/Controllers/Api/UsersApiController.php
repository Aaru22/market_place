<?php
/**
   * User API Class
   *
   * @package    Laravel
   * @subpackage Controller
   * @author     Karthiyayini <karthiyayini.a@optisolbusiness.com>
   */


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiTrait;
use Request;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Auth\AuthManager as Auth;
use App\Http\Models\Users as User;
use App\Http\Models\PasswordResets;
use Validator;
use Session;
use URL;
use Mail;

class UsersApiController extends Controller
{
    use ApiTrait;

    public $api;

    private $user;
    
    public function __construct(Auth $auth,User $user) {
        
        $this->api   = Request::segment(2);
        $this->auth  = $auth;
        $this->user  = $user;
        $admin       = $this->user->select('email')->whereId('1')->first();
        $this->email = $admin->email;
       
    }

   
    /**
       * 
       * Login validation and create login request
       *
       * @return array
       */

    public function loginCheck() 
    {
        try 
        {
            $post = $this->getData($_REQUEST);
            if (!empty($post)) {
                $data = array(
                    'username'  => $post['username'],
                    'password'  => $post['password'],
                    'is_deleted'=> 0
                );
                $rules = array('username' => 'required', 'password' => 'required');
                $validator = Validator::make($post, $rules);
                if ($validator->fails()) {
                    $messages = $validator->messages();
                    $response = $this->getReponse(FALSE, 7, $messages);
                } else {
                    $auth = $this->auth->attempt($data);
                    if($auth){
                        $userData = $this->auth->user();
                        
                        if($userData->is_active == FALSE){
                            $response = $this->getReponse(FALSE, 22, FALSE);
                        } else {
                            $response = $this->getReponse(TRUE, 1, $userData);                        
                        }         
                    } else {
                        $response = $this->getReponse(FALSE, 11, FALSE);                        
                    }         
                }
            } else {
                $response = $this->getReponse(FALSE, 3, FALSE);
            }
            return $response;
        } 
        catch (\Exception $e) 
        {
            $response = $this->getReponse(FALSE, 6, $e->getMessage());
            return $response;
        }
    }

    /**
       * 
       * Username available
       *
       * @return array
       */

    public function existCheck() 
    {
        try 
        {
            $post = $this->getData($_REQUEST);
            if (isset($post['attribute']) && !empty($post['attribute'])) {
                $result = $this->user->where($post['attribute'],$post['value'])->whereNotIn('id',[$post['id']])->first();
                if ($result) {
                    $response = $this->getReponse(FALSE, 1, FALSE);
                } else {                                            
                    $response = $this->getReponse(TRUE, 16, TRUE);
                }                
            } else {
                $response = $this->getReponse(FALSE, 3, FALSE);
            }
            return $response;
        } 
        catch (\Exception $e) 
        {
            $response = $this->getReponse(FALSE, 6, $e->getMessage());
            return $response;
        }
    }

    /**
       * 
       * Forgot password check 
       *
       * @return array
       */

    public function forgotPasswordCheck() {
        try
        {
            $post      = $this->getData($_REQUEST); 
            if (!empty($post)) {       
                $rules     = array('email' => 'required|email');
                $validator = Validator::make($post, $rules);            
                if($validator->fails()){
                  $messages = $validator->messages();
                  $response = $this->getReponse(FALSE, 7, $messages);  
                } else{
                    $oUser = $this->user->where('email',$post['email'])->first();   
                    if($oUser) {
                        $token         = sha1(mt_rand(10000, 99999) . time() . $oUser->email);
                        $link          = URL::to('/resetpassword/' . $token .'/'. $oUser->email);
                        $emailTemplate = 'forgotpassword';
                        $emailTo       = $oUser->email;
                        $emailSubject  = 'PIT MALETA : Reset Password';
                        $token         = PasswordResets::create(['email' => $oUser->email,'token' => $token,'created_at'=>date('Y-m-d H:i:s')]);
                        if($token){
                            $sent      = $this->sendEmail($emailTemplate, ['link'=>$link], $this->email,$emailTo, $emailSubject);
                            if($sent){
                                $response = $this->getReponse(TRUE, 17, $oUser);          
                            } else{       
                                $response = $this->getReponse(FALSE, 19, FALSE);          
                            }                                       
                        } else {
                            $response = $this->getReponse(FALSE, 5, FALSE);          
                        }
                                                               
                    } else {
                        $response = $this->getReponse(FALSE, 14,  FALSE);
                    }
                }  
            } else {
                $response = $this->getReponse(FALSE, 3,  FALSE);
            }           
            return $response;
        }
        catch (\Exception $e)
        {
            $response = $this->getReponse(FALSE, 6, $e->getMessage());
            return $response;
        }
    }

    /**
       * 
       * Reset password update
       *
       * @return array
       */

    public function resetPasswordCheck() {
        try 
        {
            $post      = $this->getData($_REQUEST);
            if (!empty($post)) {     
                $rules     = array('password' => 'required' );
                $validator = Validator::make($post, $rules);
                if($validator->fails()){
                    $messages = $validator->messages();
                    $response = $this->getReponse(FALSE, 7, $messages); 
                } else {
                    $oUser = $this->user->where('email',$post['email'])->first();
                    if($oUser) {
                        $confirm_code      = PasswordResets::where(['email'=>$post['email'],'token'=>$post['token']])->first();
                        $oUser->password   = Hash::make($post['password']);                       
                        $oUser->updated_at = date('Y-m-d H:i:s');                        
                        if($oUser->save()) {   
                            PasswordResets::where(['email'=>$post['email'],'token'=>$post['token']])->delete();                         
                            $response = $this->getReponse(TRUE, 18, TRUE);                        
                        } else {                         
                             $response = $this->getReponse(FALSE, 20, FALSE);                        }                        
                    } else {
                        $response = $this->getReponse(FALSE, 4, FALSE);
                    }                
                } 
            } else {
                $response = $this->getReponse(FALSE, 3,  FALSE);
            }  
            return $response;
        }
        catch (\Exception $e)
        {
            $response = $this->getReponse(FALSE, 6, $e->getMessage());
            return $response;
        }
    }

     /**
       * 
       * User get profile
       *
       * @return array
       */

    public function getProfile() 
    {
        try 
        {
            $post = $this->getData($_REQUEST);
            if (isset($post['id']) && !empty($post['id'])) {
                $oUser = $this->user->select('id','first_name','last_name','email','profile_image','telephone','address','username')
                                    ->where(['id'=>$post['id'],'is_deleted'=>0,'is_active'=>1])->get();
                if ($oUser) {
                    $response = $this->getReponse(TRUE, 1, $oUser);
                } else {                                            
                    $response = $this->getReponse(FALSE, 4, FALSE);
                }                
            } else {
                $response = $this->getReponse(FALSE, 3, FALSE);
            }
            return $response;
        } 
        catch (\Exception $e) 
        {
            $response = $this->getReponse(FALSE, 6, $e->getMessage());
            return $response;
        }
    }

     /**
       * 
       * User update profile
       *
       * @return array
       */


    public function saveProfile() {
    try
    {
        $post = $this->getData($_REQUEST);
        if (!empty($post)) {
            $rules   = ['first_name'=> 'required',
                        'last_name' => 'required',
                        'email'     => 'required|email',
                        'address'   => 'required',
                        'telephone' => 'required',
                        'is_active' => 'required'
                      ];              
            $validator = Validator::make($post,$rules);
            if($validator->fails()) {
                $messages = $validator->messages();
                $response = $this->getReponse(FALSE, 7, $messages);
            } else {                  
                $oUser = $this->user->where(['id'=>$post['id'],'is_deleted'=>0,'is_active'=>1])->first();
                if($oUser) {
                    $oUser->fill($post);
                    $oUser->updated_at = date('Y-m-d H:i:s');
                    if(isset($post['image']) && !empty($post['image'])){
                        $oUser->profile_image = $this->uploadimage('profile',$post['image']);
                    }
                    if($oUser->save()){
                        $response = $this->getReponse(TRUE, 21, $oUser);
                    } else {
                        $response = $this->getReponse(FALSE, 5, FALSE);
                    }                
                } else {
                    $response = $this->getReponse(FALSE, 4, FALSE);
                }
            }         
        } else {
            $response = $this->getReponse(FALSE, 3, FALSE);
        }
        return $response; 
      }
      catch (\Exception $e) {

          $response = $this->getReponse(FALSE, 6, $e->getMessage());

          return $response;
      }
    }

}
