<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Request as AppRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\User;
class RequestController extends Controller
{
    public function index(){
        $requests =DB::table('requests')->get()
            ->sortByDesc('id');
        return view ("requests/request", [
            'requests' => $requests
        ]);
    }
    public function userRequest(){
        $requests =DB::table('requests')->get()->where('user_id','=',Auth::id())
            ->sortByDesc('id');
        return view ("requests/UserRequest", [
            'requests' => $requests
        ]);
    }
    public function addRequest(Request $request){
        $id = DB::table('requests')->insertGetId(
            ['maxBudget' => $request->maxBudget,
             'description' =>$request->description ,
             'user_id' =>Auth::id() ,
            ]
        );
        return redirect()->back()->with('success', 'You request has been added succesfully');
    }
    public function showRequest($id){
        $offer = AppRequest::find($id);
        $user = User::find($offer->user_id);
        
        return view ("requests/requestDetails", [
            'request' => $offer,
            'user'=>$user
        ]);
    }
    public function deleteRequest($id){
        $res = AppRequest::where('id',$id)->delete();;
        return redirect("/request");
    }
}
