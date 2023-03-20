
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

          <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                Add Item
            </button>
            <br><br>


         
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0" data-page-length="50"
                    style="text-align: center">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>price</th>
                      <th>image</th>
                      <th>process</th>

                      
                  </tr>
              </thead>
              <tbody>
                  

                  <?php $i=0; ?>
                  @foreach($items as $v_items)
                  <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{$v_items->name}}</td>
                                <td> <span class="label label-pink">{{$v_items->cat_rltn->name}}</span>
                            </td>
                                <td>{{$v_items->price}}</td>
                                <td><img  src= "attachments/items/{{$v_items->image}}" width= "50px"  height="50px" alt="Image" ></td>

                                
                               
                               
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{$v_items->id}}"
                                        title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{$v_items->id}}"
                                        title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

          
     <!-- edit task -->
<div class="modal fade" id="edit{{$v_items->id}}" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="font-family: 'Cairo', sans-serif;"  class="modal-title" id="exampleModalLabel">
                    Update Items Data
                </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{route('items.update', 'test')}}" method="Post"  enctype="multipart/form-data">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                    <div class="row">

                        <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$v_items->id}}">
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Name :</label>
                            <input id="Name" type="text" name="name" class="form-control" value="{{$v_items->name}}">
                        </div>
                    </div>
                    
                    <br>

                    <div class="row">
                    <div class=" col">
                                <label for="inputState">Category Name:</label>
                                <select class="custom-select mr-sm-2" name="category"  {{$v_items->category}}>
                                    <option value ="{{$v_items->cat_rltn->id}}"> {{$v_items->cat_rltn->name}} </option>
                                    @foreach($category as $categories)
                                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                          
                            <br>

                        <div class="row">
                        <div class="col">
                        <label for="Name" class="mr-sm-2">  Price :</label>
                            <input id="Name" type="number" min="1.00" step="1.00" name="price" class="form-control" value="{{$v_items->price}}">
                        </div>
                        </div>


                            <br>


                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for="academic_year">Photo: <span class="text-danger">*</span></label>
                                  <input type="file" accept="image/*" name="photo"> <br>
                                  <img src=  "attachments/items/{{$v_items->image}}" width= "50px"  height="50px" alt="Image"   height="70px"  width="70px" />
                              </div>
                          </div>
                            

                   
                    
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>

        </div>
    </div>
</div>
              
        

  <!-- delete task -->
  <div class="modal fade" id="delete{{$v_items->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                DELETE Item
                                            </h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('items.destroy', 'test')}}" method="post" >
                                                {{ method_field('Delete') }}
                                                @csrf
                                               
                                                Are You Sure To Delete this Item : {{$v_items->name}}  

                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{$v_items->id}}">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           @endforeach 
                
           </table>
          </div>
          </div>
        </div>   
      </div>
  

      


          <!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" 
           aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add Item
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{route('items.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Name :</label>
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        
                    </div>

                    <br>

                    <div class="row">
                    <div class=" col">
                                <label for="inputState">Category Name</label>
                                <select class="custom-select mr-sm-2" name="category" required>
                                    <option selected disabled>Choose a Category ...</option>
                                    @foreach($category as $categories)
                                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>

                        <br>
                        
                        <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">
                                Price :</label>
                            <input id="Name" type="number" min="1.00" step="1.00" name="price" class="form-control">
                        </div>
                    </div>

                    <br>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="academic_year">Photo: <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="photo" >
                        </div>
                    </div>



                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">submit</button>
            </div>
            </form>

        </div>
    </div>
</div>

        

@endsection



