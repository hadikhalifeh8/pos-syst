@extends('layouts.layoutAdmin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-6 mb-4">
            <div class="row mb-2">
                <!-- <div class="col">
                    <form class="d-flex">
                        <input
                            type="text"
                            class="form-control productCode"
                            placeholder="Scan Barcode..."
                        />
                        <button class="btn btn-sm rounded btn-success scan">Find</button>
                    </form>
                </div> -->
             
                 <span class="text-danger">   {{date("l jS \of F Y")}}</span> 
            </div>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            
            <div class="user-cart">
                <div class="card">
                    <table class="table">
                        <thead class="big-info">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th class="text-right">Single Price</th>
                                <th class="text-right">Sub Total</th>
                                <th class="text-danger">x</th>
                                


                            </tr>
                        </thead>

                       
                       
                        <?php  
                        $cart = Cart::content();
                        ?>
                         <tbody>
                        @foreach($cart as $v_cart_items)

                
<tr>

    <th>{{$v_cart_items->name}}</th>
    
    <th>
        <form action="{{url('updateCart/'.$v_cart_items->rowId)}}" method="post">
        {{ csrf_field() }} 
        <input type="number" name="qty" value="{{$v_cart_items->qty}}" min="1"  style="width:45px" >
        <button type="submit" class="btn-btn-sm btn-success"><i class="fa fa-check"></i></button>
        </form>
</th>

    <th i class="text-primary">{{$v_cart_items->price}}</th>
    <th i class="text-success">{{$v_cart_items->price*$v_cart_items->qty}}</th>
    <th><a href="{{url('cart-remove/'.$v_cart_items->rowId)}}"><i class=" text-danger fas fa-trash-alt"></i></a></th>
    
</tr>





</tbody>

@endforeach
                
                        

                    </table>
                    
<div class="pricing-footer bg-success text-white">
    <p style="font-size: 25"> Quantity :   {{ Cart::count(); }}</p>
    <p style="font-size: 25"> Total Price :   {{ Cart::subtotal(); }}</p>

</div>
                </div>
            </div>

            
            <form action="{{url('add-invoice')}}" method="post">
                @csrf 

                <div class="row">
             
                    <div class="col">
                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
                        >
                            Pay
                        </button>
                    </div>
                </div>

                  
            
            
                </form>
            

        </div>

        <div class="col-md-6 col-lg-6">
            <!-- <div class="mb-2">
                <input
                    type="text"
                    class="form-control search"
                    placeholder="Search Product..."
                />
            </div> -->
            <br />
           
            <div class="order-product product-search" style="display: flex;column-gap: 0.5rem;flex-wrap: wrap;row-gap: .5rem;">
            @foreach($items as $row)
            <form action="{{url('addCart')}}" method="post">   
            {{ csrf_field() }} 
           
                    

                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="name" value="{{$row->name}}">
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="price" value="{{$row->price}}">




                    <button type="submit"
                        class="item"
                        style="cursor: pointer; border: none;"
                        value="{{ $row->id }}"
                    >
                        
                        <img src="attachments/items/{{$row->image}}" width= "80px"  height="80px" width="60px" height="60px" alt="test" />
                        
                        <h6 style="margin: 0;">{{ $row->name }}</h6>
                        <!-- <span >{{ $row->price }}</span> -->
                    </button>
                
                    
                    </form>
                    @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection




