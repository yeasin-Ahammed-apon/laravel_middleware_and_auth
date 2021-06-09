<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class dev extends Controller
{
    // home page or data list page
    public function home(){
        // read all data query
        $db = DB::table('blog_data')
        ->orderBy('id', 'desc')
        ->get();
        return view("pages.home",["datas"=>$db]);
    }
    //view page
    public function view($id){
        // read single data query
        $db = DB::table('blog_data')->where("id",$id)->first();
        return view("pages.view",["data"=>$db]);
    }
    //add page
    public function add_page(){
        return view("pages.add");
    }

    // add action
    public function add(Request $request){

        $name = $request->name;
        $details = $request->details;

        $validated = $request->validate([
            'name' => 'required | max:99 |unique:blog_data,name',
            'details' => 'required',
        ]);
        // add new data query
        DB::table('blog_data')->insert([
            "name" => $name,
            "details" => $details,
            "created_at" => now()             

        ]);
        
        return redirect("/")->with("massage","Data Added successfully");
    }
    // edit page
    public function edit_page($id){
        // single data read query
        $db = DB::table('blog_data')->where('id',$id)->first();
        return view("pages.edit",['data' => $db]);
    }
    // update action 
    public function update(Request $request){

        $id = $request->id;
        $name = $request->name;
        $details = $request->details;
        
        $validated = $request->validate([
            'name' => 'required|max:99|unique:blog_data,name,'.$id.',id',
            'details' => 'required',
        ]);
        
        // update query
        DB::table('blog_data')
                        ->where('id',$id)
                        ->update([
                            "name" => $name,
                            "details" => $details,
                            "updated_at" => now()
                        ]);
        
        return redirect("/")->with("massage","Data updated successfully");
    }
    //delete action
    public function delete($id){
        // delete query
        DB::table('blog_data')->where("id",$id)->delete();
        return redirect("/")->with("massage","Data Deleted successfully");
    }
}
