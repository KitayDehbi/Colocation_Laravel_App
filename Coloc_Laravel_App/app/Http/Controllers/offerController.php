<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Offer;
use App\User;
class offerController extends Controller
{
    public function index(){
        $offers = Offer::all()->sortByDesc('id');
        return view ("offers/offer", [
            'offers' => $offers
        ]);
    }
    public function userOffer(){
        $offers = Offer::all()->where('user_id','=',Auth::id())->sortByDesc('id');
        return view ("offers/UserOffer", [
            'offers' => $offers
        ]);
    }

    public function addOffer(Request $request){
       // $address = $request->address;
        //$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false');
        //$output= json_decode($geocode);
        //$lat = $output->results[0]->geometry->location->lat;
        //$long = $output->results[0]->geometry->location->lng;
        //echo($lat);
        //echo($long);
        $id = DB::table('offers')->insertGetId(
            ['address' => $request->address,
             'area' => $request->area, 
             'price' =>$request->price ,
             'capacity'=> $request->capacity,
             'description' =>$request->description ,
             'imgPath' =>$request->imgPath ,
             'user_id' =>Auth::id() ,
            ]
        );
        return redirect()->back()->with('success', 'You Offer has been added succesfully');   
    }
    public function showOffer($id){
        $offer = Offer::find($id);
        $user = User::find($offer->user_id);
        
        return view ("offers/offerDetails", [
            'offer' => $offer,
            'user'=>$user
        ]);
    }
    public function deleteOffer($id){
        $res = Offer::where('id',$id)->delete();;
        return redirect("/offer");
    }
}
