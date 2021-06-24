@extends('app.admin.layout.app')
<?php
$loginUser = Auth::user();
?>


@section('content')
<?php
                                $loginUser = Auth::user();
                                if ($loginUser->role_id == 1) {
                                    ?>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Order List</h4>
              </div>
              <div class="card-body">
                <div class="psa-table" id="">
                  <table class="pyaegyitable " id="myTable">
                    <thead class=" text-primary">
                      <tr style="border-bottom:2px solid white;margin-bottom:10px;">
                        
                        <th>
                          User's Name
                        </th>
                        <th>
                          User's Phone Number
                        </th>
                        <th>
                          Address
                        </th>

                        
                        <th>
                        Product's Name
 
                      </th>
                        <th>
                          Product's Quantity
                        </th>
                        
                        <th class="text-center">
                          Delivery Done
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($objs as $obj)
                      <tr>
                        <td>
                          @foreach($objs3 as $obj3)
                          @foreach($objs2 as $obj2)
                          <?php 
                          $o_id = $obj->id;
                          $o=$obj3;
                          $o_id2 = $o->o_id;
                          if($o_id == $o_id2){
                          
                          
                          $u_id = $obj2->id;
                        $u_id2 = $obj->u_id;
                          if($u_id == $u_id2){
                              echo $obj2->name;
                          
                          }
                          } 
                          ?>
                          @endforeach
                         
                         @endforeach
                        </td>
                        <td>
                        @foreach($objs3 as $obj3)
                          @foreach($objs2 as $obj2)
                          <?php 
                          $o_id = $obj->id;
                          $o=$obj3;
                          $o_id2 = $o->o_id;
                          if($o_id == $o_id2){
                          
                          
                          $u_id = $obj2->id;
                          $u_id2 = $obj->u_id;
                          if($u_id == $u_id2){
                              echo $obj2->phone;
                          
                          }
                          } 
                          ?>
                          @endforeach
                         
                         @endforeach
                        </td>
                        <td>
                 
                              {{ $obj->location}}   
                         
                        
                        </td>
                      
                        <td>
                          @foreach($objs3 as $obj3)
                          @foreach($objs5 as $obj5)
                          <?php 
                          $o_id = $obj->id;
                          $o=$obj3;
                          $o_id2 = $o->o_id;
                          if($o_id == $o_id2){
                          
                        
                          $s_id = $obj5->id;
                          $s_id2 = $o->p_id;
                          if($s_id == $s_id2){
                              echo $obj5->name;
                          }
    
                        }
                          ?>
                          @endforeach
                         
                         @endforeach
                        </td>
                        <td>
                          @foreach($objs3 as $obj3)
                          <?php 
                          $o_id = $obj->id;
                          $o=$obj3;
                          $o_id2 = $o->o_id;
                          if($o_id == $o_id2){
                              echo $obj3->qty;
                          }      
                          ?>
                    
                         
                         @endforeach
                        </td>
                  
                        <td class="text-center">
                         
                            <form id="confirm_delete_{{ $obj->id }}" action="/confirmDelivery" method="post">
                                                <button style="margin-top:15px;" type="button" onclick="confirm_delivery_record(this.id);"  class="btn btn-fill btn-primary" id="{{ $obj->id }}">Delivered</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          
                                                <input type="hidden" id="o_id" name="o_id" value="{{$obj->id}}"></input>
                                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

<?php 
        }
 ?>
@endsection