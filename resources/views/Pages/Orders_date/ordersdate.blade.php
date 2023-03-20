
@extends('layouts.layoutAdmin')
@section('content')

   
              
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br>

         
            <br><br>


         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Order Date</th>
                      <th>Total Products</th>
                      <th>Total Salary</th>
                      

                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($order as $v_order)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{$v_order->order_date}}</td>
                                <td> {{$v_order->total_products}}</td>
                                <td>{{$v_order->sub_total}}</td>
                                   
                               
                              
                            </tr>

          


                           @endforeach 
                
           </table>
          </div>
          </div>
        </div>   
      </div>
  

      
      <span>Today Total Salary: {{$total}}</span>
      
     


        

@endsection



