<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class login extends Controller
{
    // login page
    public function login_page(){        
        return view("pages.login.login");
    }   
    //login action
    public function login(Request $request){       

        $email = $request->email;
        $password = $request->password;

        $validated = $request->validate([            
            'email' => 'required|email',
            'password' => 'required'
        ]);

         $db = DB::table('users')
        ->where('email',$email)        
        ->first();
       
        // dd($db);

        if ($db) {//if email exists
            if (Hash::check($password, $db->password)) {//if password match            
               $request->session()->put('logedin', $db->email);
               $request->session()->put('name', $db->name);
                return redirect('/')->with('massage',"login succsessfull");    

            }else{// if password not match
                return redirect('/login_page')->with('faild_massage',"login faild . invaild email or >password"); 
            }
        } else {//if no email exists
            return redirect('/login_page')->with('faild_massage',"login faild . invaild >email or password");    
        }
                
    } 
    // register page
    public function register_page(){ 
               
        return view("pages.login.register");
    } 
    //register action
    public function register(Request $request){ 

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $validated = $request->validate([
            'name' => 'required | max:30 |unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:12'
        ]);    
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now()
        ]);
        return redirect('/login_page')->with('massage','new user added successfully . plz login');
    } 

    public function logout(){
        session()->forget(['logedin','name']);
        return redirect('/login_page')->with("massage", "you are logout know");
    }
}

