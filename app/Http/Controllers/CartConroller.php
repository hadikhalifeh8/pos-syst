<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdersModel;

use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartConroller extends Controller
{
    public function store(Request $request)
    {
        $data = array();
            $data['id']= $request->id;
            $data['name']= $request->name;
            $data['qty']= $request->qty;
            $data['price']= $request->price;

            $add = Cart::add($data);
           


            toastr()->success('Item Added');
            return redirect()->route('pos.index');

        // echo "<pre>";
        // print_r($data);
            
        
            // $items->save();
    
            // toastr()->success('Items Data Saved Successfully');
            // return redirect()->route('items.index'); 
    }

    public function update(Request $request, $rowId)
    {
        
        $qty = $request->qty;

       $update = Cart::update($rowId, $qty);

        if($update){


            toastr()->success('Item updated');
            return redirect()->route('pos.index');
             }else{
             toastr()->error('Error');
            return redirect()->route('pos.index');
 
             }
    }



    public function remove($rowId)
    {
      $remove = Cart::remove($rowId);

      toastr()->error('Item Deleted');
      return redirect()->route('pos.index');
    }



// ==> order pages
    public function addinvoice(Request $request)
    { 
    //   $lirarate = $request->lirarate;
    //   return $lirarate;
        
        $order = OrdersModel::all();
        $content = Cart::content();
        return view('Pages.Orders.orders',compact('content','order','lirarate'));
        

         //  echo "<pre>";
        //  print_r($content); 
         // return redirect()->route('Orders.orders.index',compact('content'));

    }


    public function finalinvoice(Request $request)
    {
        $data =array();
        $data['order_date'] = $request->order_date;
         $data['total_products'] = $request->total_products; 
         $data['sub_total'] = $request->sub_total;

         $order_id = DB::table('orders')->insertGetId($data);

         $contents = Cart::content();

         $odata = array();

         foreach($contents as $v_content)
         {
            $odata['order_id'] = $order_id;
            $odata['items_id'] = $v_content->id;
            $odata['quantity'] = $v_content->qty;
            $odata['price'] = $v_content->price;
            $odata['totalprice'] = $v_content->qty * $v_content->price;

            $insert = DB::table('ordersdetails')->insert($odata);

         }

         toastr()->success('Order Added');
         Cart::destroy();
   
      return redirect()->route('pos.index');

    }
}
