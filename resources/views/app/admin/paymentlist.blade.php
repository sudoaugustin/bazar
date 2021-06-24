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
                <h4 class="card-title"> Payment List</h4>
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
                         Location
                        </th>

                        <th>
                          Payment Method
                        </th>
                        <th>
                        Amount
 
                      </th>
                        <th>
                          Payment Contact
                        </th>
                        <th class="text-center">
                          Confirm Payment
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($objs as $obj)
                      <tr>
                        <td>
                          @foreach($objs2 as $obj2)
                          <?php 
                          $u_id = $obj->u_id;
                          $u_id2 = $obj2->id;
                          if($u_id == $u_id2){
                          echo $obj2->name;
                          }
                          ?>
                          @endforeach
                        </td>
                        <td>
                          {{$obj->location}}
                        </td>
                      
                        <td>
                        {{$obj->payment_method}}
                        </td>
                        <td>
                        @foreach($objs3 as $obj3)
                          <?php 
                          $id = $obj->id;
                          $o_id = $obj3->o_id;
                          if($id == $o_id){
                          echo $obj3->amount;
                          }
                          ?>
                          @endforeach
                        </td>
                        <td>
                        {{$obj->payment_contact}}
                        </td>
                        <td class="text-center">
                         
                            <form id="confirm_delete_{{ $obj->id }}" action="/confirmPayment" method="post">
                                                <button style="margin-top:15px;" type="button" onclick="confirm_record(this.id);"  class="btn btn-fill btn-primary" id="{{ $obj->id }}">Confirm</button>
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