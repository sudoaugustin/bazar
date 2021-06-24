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
                          Shop's Name
                        </th>
                        <th>
                          Shop's Address
                        </th>
                 
                        
                        <th>
                        Product's Name
 
                      </th>
                        <th>
                          Product Quantity
                        </th>
                        <th class="text-center">
                          Finish
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($objs3 as $obj3)
                      <tr>
                        <td>
                          @foreach($objs as $obj)
                          @foreach($objs4 as $obj4)
                          <?php 
                          $o_id = $obj->id;
                          $o=$obj3;
                          $o_id2 = $o->o_id;
                          if($o_id == $o_id2){
                          
                          
                          $s_id = $obj4->id;
                          $s_id2 = $o->s_id;
                          if($s_id == $s_id2){
                              echo $obj4->name;
                          
                          }
                          } 
                          ?>
                          @endforeach
                         
                         @endforeach
                        </td>
                        <td>
                          @foreach($objs as $obj)
                          @foreach($objs4 as $obj4)
                          <?php 
                          $o_id = $obj->id;
                          $o=$obj3;
                          $o_id2 = $o->o_id;
                          if($o_id == $o_id2){
                          
                        
                          $s_id = $obj4->id;
                          $s_id2 = $o->s_id;
                          if($s_id == $s_id2){
                              echo $obj4->address;
                          }
    
                          } 
                          ?>
                          @endforeach
                         
                         @endforeach
                        </td>
                  
                      
                        <td>
                          @foreach($objs as $obj)
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
                          @foreach($objs as $obj)
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
                         
                            <form id="confirm_delete_{{ $obj3->id }}" action="/confirmOrder" method="post">
                                                <button style="margin-top:15px;" type="button" onclick="confirm_order_record(this.id);"  class="btn btn-fill btn-primary" id="{{ $obj3->id }}">Finish</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          
                                                <input type="hidden" id="o_id" name="o_id" value="{{$obj3->id}}"></input>
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