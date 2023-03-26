
@extends('layouts.layoutAdmin')
@section('content')

   
              
                            <!-- start row -->
                            <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- <div class="panel-heading">
                                                <h4>Invoice</h4>
                                            </div> -->
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h4 class="text-right"><img src="assets/images/logo-dark.png" height="18" alt="moltran"></h4>

                                            </div>
                                            <div class="float-right">
                                                <h5>Lira rate:{{$lirarate}} <br>
                                                            <strong>Price: 2565</strong>
                                                        </h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="float-left mt-4">
                                                    <address>
                                                            <strong>Caffe Chocco</strong><br>
                                                            sarafand<br>
                                                            dhoor sarafand<br>
                                                            <abbr title="Phone">P:</abbr> (961) 70-123456
                                                            </address>
                                                </div>
                                                <div class="float-right mt-4">
                                                    <p><strong>Order Date: </strong> {{date("l jS \of F Y")}}</p>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">

                                      

                                                    <table class="table mt-4">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Item Name</th>
                                                                <th>Quantity</th>
                                                                <th>Price</th>
                                                                <th>Total Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $i=0; ?>
                                                            @foreach($content as $v_content)
                                                            <tr>

                                                   <input type="hidden" name="id" value="{{$v_content->name}}">
                                                   <input type="hidden" name="name" value="{{$v_content->qty}}">
                                                   <input type="hidden" name="qty" value="{{$v_content->price}}">
                                                   <input type="hidden" name="price" value="{{$v_content->price*$v_content->qty}}">


                                                            
                                                            <?php $i++; ?>
                                                            <td>{{ $i }}</td>
                                                                <td>{{$v_content->name}}</td>
                                                                <td>{{$v_content->qty}}</td>
                                                                <td>{{$v_content->price}}</td>
                                                                <td>{{$v_content->price*$v_content->qty}}</td>
                                                            </tr>
                                                       
                                                          
                                                     @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px">
                                            <div class="col-md-3 offset-md-9">
                                                <!-- <p class="text-right"><b>Sub-total:</b> {{Cart::subTotal()}}</p>
                                                <p class="text-right">Discout: 12.9%</p>
                                                <p class="text-right">VAT: 12.9%</p> -->
                                                <hr>
                                                <h3 class="text-right text-danger">Total: {{Cart::subTotal()}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        



                    




                                        <div class="d-print-none">
                                            <div class="float-right">

                                            
                                            <form action="{{url('final-invoice')}}" method="post">
                                                @csrf

                                                  
                                                <input type="hidden" name="order_date" value="{{date('d/m/y')}}">
                                                <input type="hidden" name="total_products" value="{{Cart::count()}}">
                                                <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">




                                                <a href="#" onclick="window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <button type="submit"  class="btn btn-primary waves-effect waves-light">Submit</button>
                                            
                                               
                                            </form>
                               
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->  

      


        

@endsection



