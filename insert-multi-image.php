<?php

namespace App\Http\Controllers;
use App\Models\employee;
use App\Models\append;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;



class user extends Controller
{
     function index($id=''){
    	return view('post', ['id'=>$id]);
    }

    function post(){
        return view('post');
    }


    public function insert(Request $request){
    	  $first_name = $request->input('exampleInputEmail1');
          $password = $request->input('password');
          $data = array('email'=> $first_name,'passswors'=> $password);
          echo $data['email'];
    }

     function insertpost(Request $request){

       echo  $request->post('name');


    }

    
    
     function employeestore(Request $r){

        $validated = $r->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pincode' => 'required'
        ]);

        $emp = new employee();
        $emp->name = $r->name;        
        $emp->email = $r->email;     
        $emp->address = $r->address;             
        $emp->city = $r->city;             
        $emp->pincode = $r->pincode;
        $emp->save();
        return redirect('employeeadd');
 
 
     }
      function append_test(Request $request){
       
        return view('append.view');


    }

    function appendpost(Request $request){
        // dd($request->all());
        $names = $request->input('name');
    $images = $request->file('image');

    // Iterate over the arrays and process each entry
    foreach ($names as $index => $name) {
        $image = $images[$index];

        // Perform validation and database insertion for each entry
        // For example, you can save the image to a storage location and store the name and image path in the database

        // Save the image file to a storage location
        $path = $image->store('images');

        // Store the name and image path in the database
             $appendd = new append();
            $appendd->apend_email = $name;        
            $appendd->apend_image = $path;     
            $appendd->form_id = '33';  
            $appendd->save();


    }
    }

    // function mailtest(){

    //     $data = array('name'=>"Virat Gandhi");
    //     Mail::send('mail.mail', $data, function($message) {
    //        $message->to('js2072356@gmail.com', 'Tutorials Point')->subject
    //           ('Laravel Testing Mail with Attachment');
    //     //    $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
    //     //    $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
    //        $message->from('xyz@gmail.com','Virat Gandhi');
    //     });
    //     echo "Email Sent with attachment. Check your inbox.";
    // }
}   
