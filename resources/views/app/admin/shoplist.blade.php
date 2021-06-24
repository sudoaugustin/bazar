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
                <h4 class="card-title">Shop Lists</h4>
              </div>
              <div class="card-body">
                <div class="psa-table" id="">
                  <table class="pyaegyitable " id="myTable">
                    <thead class=" text-primary">
                      <tr>
                        
                        <th>
                          Owner's Name
                        </th>
                        <th>
                          Shop's Name
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          Address
                        </th>
                        <th class="text-center">
                          Upgrade Shop
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
                          {{$obj->name}}
                        </td>
                        <td>
                        {{$obj->description}}
                        </td>
                        <td>
                        {{$obj->address}}
                        </td>
                        <td class="text-center">
                         
                            <form id="confirm_delete_{{ $obj->id }}" action="/upgradeshop" method="post">
                                                <button style="margin-top:15px;" type="button" onclick="delete_record(this.id);"  class="btn btn-fill btn-primary" id="{{ $obj->id }}">Upgrade</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          
                                                <input type="hidden" id="s_id" name="s_id" value="{{$obj->id}}"></input>
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