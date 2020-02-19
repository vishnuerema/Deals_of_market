<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\users;
use App\home_product;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function usersRegistration(Request $request){

         $usrdata = $request->all();
         $data= $usrdata;
         if (Users::where('email', '=', $data['email'])->orWhere('phone', '=', $data['phone'])->first()){

            return response()->json(['status' => false]);
         }
         else{
                 $hashedPassword = Hash::make($data['password']);
                 $userRegister = new users;
                 $userRegister->name = $data['name'];
                 $userRegister->email = $data['email'];
                 $userRegister->phone = $data['phone'];
                 $userRegister->password = $hashedPassword;
                 $userRegister->save();

             return response()->json(['status' => true]);
         }

    }

    public function usersLogin(Request $request){

	     $data = $request->all();
	     $username = $data['name'];
	     $user = Users::where('phone', '=', $data['name'])->orWhere('email' , $data['name'])->first();
	     // print_r(Hash::check($data['login_pass'], $user->password));
	     if (!$user) {
	        return response()->json(['status'=>false, 'message' => 'Login Fail, please check phone numer or email']);
	     }
	     if (!Hash::check($data['password'], $user->password)) {
	        return response()->json(['status'=>false, 'message' => 'Login Fail, pls check password']);
        }
        else{

            $request->session()->put('username', $username);
	        return response()->json(['status' => true]);
        }
   }

   public function home(){
        $getallprodct= home_product::where('home_product_deal_of_the_day', '=', '1')->get(); // top picks
        $getdealsprodct = home_product::get(); // top picks
                
        return response()->json(array($getallprodct,$getdealsprodct));
   }

   public function productadd(){
        $getAdd= DB::table('product_adds') ->limit(3)->get(); // top picks
                
        return response()->json($getAdd);
   }

    public function viewproduct_data(Request $request){
       $url_id = $request->all();
        $ul = $url_id['path'];
        $getprod = DB::table('home_products')->where('home_product_id', $ul)->get();
                
        return response($getprod);
   }

}
