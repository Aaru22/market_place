<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//public API routes
$api->group(['middleware' => ['api']], function ($api) {

    $api->post('{lanuguage}' , 
        [ 'before'=>'csrf' ,'as' => 'lanuguage', 'uses' => 'UsersApiController@getLanuguage'])->where('lanuguage', '(?i)lanuguage(?-i)'); 

    $api->post('{loginCheck}', ['as' =>'loginCheck', 'uses'=>'UsersApiController@loginCheck'])
        ->where('loginCheck', '(?i)loginCheck(?-i)');

    $api->post('{existCheck}', ['as' =>'existCheck', 'uses'=>'UsersApiController@existCheck'])
        ->where('existCheck', '(?i)existCheck(?-i)');   

    $api->post('{forgotPasswordCheck}', ['as' =>'forgotPasswordCheck', 'uses'=>'UsersApiController@forgotPasswordCheck'])
        ->where('forgotPasswordCheck', '(?i)forgotPasswordCheck(?-i)');    

    $api->post('{resetPasswordCheck}', ['as' =>'resetPasswordCheck', 'uses'=>'UsersApiController@resetPasswordCheck'])
        ->where('resetPasswordCheck', '(?i)resetPasswordCheck(?-i)');  

    $api->group(['prefix' => 'user'], function($api)
    {
    
        $api->post('{getProfile}', ['as' =>'user.api.getProfile', 'uses'=>'UsersApiController@getProfile'])
            ->where('getProfile', '(?i)getProfile(?-i)');

        $api->post('{saveProfile}', ['as' =>'user.api.saveProfile', 'uses'=>'UsersApiController@saveProfile'])
            ->where('saveProfile', '(?i)saveProfile(?-i)');
    });  

    $api->group(['prefix' => 'customer'], function($api)
    {
        
        $api->post('{getCustomers}', ['as' =>'customer.api.getCustomers', 'uses'=>'CustomerApiController@getCustomers'])
            ->where('getCustomers', '(?i)getCustomers(?-i)'); 
        
        $api->post('{search}', ['as' =>'customer.api.search', 'uses'=>'CustomerApiController@searchCustomer'])
            ->where('search', '(?i)search(?-i)');       

        $api->post('{getprofile}', ['as' =>'customer.api.getProfile', 'uses'=>'CustomerApiController@getProfile'])
            ->where('getprofile', '(?i)getprofile(?-i)');       
        
        $api->post('{saveprofile}', ['as' =>'customer.api.saveProfile', 'uses'=>'CustomerApiController@saveProfile'])
            ->where('saveprofile', '(?i)saveprofile(?-i)');

        $api->post('{saveservice}', ['as' =>'customer.api.saveService', 'uses'=>'CustomerApiController@saveService'])
            ->where('saveservice', '(?i)saveservice(?-i)');  

        $api->post('{getService}', ['as' =>'customer.api.getService', 'uses'=>'CustomerApiController@getService'])
            ->where('getService', '(?i)getService(?-i)');  

        $api->post('{deleteService}', ['as' =>'customer.api.deleteService', 'uses'=>'CustomerApiController@deleteService'])
            ->where('deleteService', '(?i)deleteService(?-i)'); 

        $api->post('{saveContact}', ['as' =>'customer.api.saveContact', 'uses'=>'CustomerApiController@saveContact'])
            ->where('saveContact', '(?i)saveContact(?-i)');  

        $api->post('{getContact}', ['as' =>'customer.api.getContact', 'uses'=>'CustomerApiController@getContact'])
            ->where('getContact', '(?i)getContact(?-i)');  

        $api->post('{deleteContact}', ['as' =>'customer.api.deleteContact', 'uses'=>'CustomerApiController@deleteContact'])
            ->where('deleteContact', '(?i)deleteContact(?-i)');     

        $api->post('{changeStatus}', ['as' =>'customer.api.changeStatus', 'uses'=>'CustomerApiController@changeStatus'])
            ->where('changeStatus', '(?i)changeStatus(?-i)'); 

                        
    });


    $api->group(['prefix' => 'settings'], function($api)
    {

        $api->post('{getValue}', ['as' =>'settings.api.getValue', 'uses'=>'SettingsApiController@getReferenceValue'])
            ->where('getValue', '(?i)getValue(?-i)'); 

        $api->post('{saveValue}', ['as' =>'settings.api.saveValue', 'uses'=>'SettingsApiController@saveReferenceValue'])
            ->where('saveValue', '(?i)saveValue(?-i)'); 

        $api->post('{deleteValue}', ['as' =>'settings.api.deleteValue', 'uses'=>'SettingsApiController@deleteReferenceValue'])
            ->where('deleteValue', '(?i)deleteValue(?-i)');             

       
    });

    $api->group(['prefix' => 'patient'], function($api)
    {
        
        $api->post('{getPatients}', ['as' =>'patient.api.getPatients', 'uses'=>'PatientApiController@getPatients'])
            ->where('getPatients', '(?i)getPatients(?-i)'); 
        
        $api->post('{search}', ['as' =>'patient.api.search', 'uses'=>'PatientApiController@searchPatient'])
            ->where('search', '(?i)search(?-i)');                       
        
        $api->post('{saveProfile}', ['as' =>'patient.api.saveProfile', 'uses'=>'PatientApiController@saveProfile'])
            ->where('saveProfile', '(?i)saveProfile(?-i)');         

        $api->post('{changeStatus}', ['as' =>'patient.api.changeStatus', 'uses'=>'PatientApiController@changeStatus'])
            ->where('changeStatus', '(?i)changeStatus(?-i)'); 

        $api->post('{getprofile}', ['as' =>'patient.api.getProfile', 'uses'=>'PatientApiController@getProfile'])
            ->where('getprofile', '(?i)getprofile(?-i)');

        $api->post('{search}', ['as' =>'patient.api.search', 'uses'=>'PatientApiController@searchPatient'])
            ->where('search', '(?i)search(?-i)');
                        
    });

    $api->group(['prefix' => 'doctor'], function($api)
    {
        
        $api->post('{getDoctors}', ['as' =>'doctor.api.getDoctors', 'uses'=>'DoctorApiController@getDoctors'])
            ->where('getDoctors', '(?i)getDoctors(?-i)'); 
        
        $api->post('{search}', ['as' =>'doctor.api.search', 'uses'=>'DoctorApiController@searchDoctor'])
            ->where('search', '(?i)search(?-i)');    

        $api->post('{changeStatus}', ['as' =>'doctor.api.changeStatus', 'uses'=>'DoctorApiController@changeStatus'])
            ->where('changeStatus', '(?i)changeStatus(?-i)');     
                
        $api->post('{getprofile}', ['as' =>'doctor.api.getProfile', 'uses'=>'DoctorApiController@getProfile'])

            ->where('getprofile', '(?i)getprofile(?-i)');

        $api->post('{saveProfile}', ['as' =>'doctor.api.saveProfile', 'uses'=>'DoctorApiController@saveProfile'])
            ->where('saveProfile', '(?i)saveProfile(?-i)');                 
                        
    });

    $api->group(['prefix' => 'operator'], function($api)
    {
        
        $api->post('{getOperators}', ['as' =>'operator.api.getOperators', 'uses'=>'OperatorApiController@getOperators'])
            ->where('getOperators', '(?i)getOperators(?-i)'); 
        
        $api->post('{search}', ['as' =>'operator.api.search', 'uses'=>'OperatorApiController@searchOperator'])
            ->where('search', '(?i)search(?-i)');    

        $api->post('{changeStatus}', ['as' =>'operator.api.changeStatus', 'uses'=>'OperatorApiController@changeStatus'])
            ->where('changeStatus', '(?i)changeStatus(?-i)');     
                
        $api->post('{getprofile}', ['as' =>'operator.api.getProfile', 'uses'=>'OperatorApiController@getProfile'])
            ->where('getprofile', '(?i)getprofile(?-i)');      
        
        $api->post('{saveprofile}', ['as' =>'operator.api.saveProfile', 'uses'=>'OperatorApiController@saveProfile'])
            ->where('saveprofile', '(?i)saveprofile(?-i)');

        $api->post('{saveservice}', ['as' =>'operator.api.saveService', 'uses'=>'OperatorApiController@saveService'])
            ->where('saveservice', '(?i)saveservice(?-i)');  
    });


    $api->group(['prefix' => 'group'], function($api)
    {
        
        $api->post('{getGroups}', ['as' =>'group.api.getGroups', 'uses'=>'GroupApiController@getGroups'])
            ->where('getGroups', '(?i)getGroups(?-i)'); 
        
        $api->get('{getGroup}', ['as' =>'group.api.getGroup', 'uses'=>'GroupApiController@getGroup'])
            ->where('getGroup', '(?i)getGroup(?-i)');           
    
        $api->post('{search}', ['as' =>'group.api.search', 'uses'=>'GroupApiController@searchGroup'])
            ->where('search', '(?i)search(?-i)');   
            
        $api->post('{changeStatus}', ['as' =>'group.api.changeStatus', 'uses'=>'GroupApiController@changeStatus'])
            ->where('changeStatus', '(?i)changeStatus(?-i)');           
            
        $api->post('{saveGroup}', ['as' =>'group.api.saveGroup', 'uses'=>'GroupApiController@saveGroup'])
            ->where('saveGroup', '(?i)saveGroup(?-i)');

        $api->post('{existCheck}', ['as' =>'existCheck', 'uses'=>'GroupApiController@existCheck'])
        ->where('existCheck', '(?i)existCheck(?-i)');   

        $api->post('{deleteUser}', ['as' =>'group.api.deleteUser', 'uses'=>'GroupApiController@deleteUser'])
            ->where('deleteUser', '(?i)deleteUser(?-i)'); 

    });
        

});
