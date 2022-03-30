<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Client;
use App\Models\Currency;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function index()
    {
        $p=Product::all();
        return view('index',['prod'=>$p]);
    }
    public function orders(){
        $order=Order::all();
        return view('orders',['orders'=>$order]);
    }
    public function action(Request $request)
    {
        $order = new Order();
        $user=Client::where('name',$request->ism)->firstOrFail();
        $order->client_id=$user->id;
        $order->product_id=$request->prID;
        $order->amount=$request->num;
        $order->save();
       return redirect()->route('orders');
    }
    public function login(){
       return view('login');
    }
    public function auth(Request $request)
    {
        $ism=$request->ism;
        $fam=$request->fam;
        $user=Client::where('name',$ism)->firstOrFail();
        if ($user->family = $fam) {
            Cache::put('ism',$user->name);
            Cache::put('fam',$user->family);
        }
        return redirect()->route('index');
    }

    public function clients(){
        $cl = Client::all();
        $cl=$cl->toJson();
        return view('clients',['client'=>$cl]);
    }

    public function store(){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://openexchangerates.org/api/currencies.json",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET"
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);
        $d=json_decode($response,true);

        foreach ($d as $key => $value)
        {
            $crr = new Currency();
            $crr->short_name = $key;
            $crr->country = $value;  
            $crr->save();
        }
        $c=Currency::all();
        dd($c);
    }

    
}
