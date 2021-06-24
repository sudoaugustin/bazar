//$type
<tr>
  <th>ID</th>
  <th>Date</th>
  <th>Total</th>
  <th>Actions</th>
</tr>
@foreach ($orders as $order)
  <tr>
    <td>{{$order->id}}</td>
    <td>{{explode(" ",$order->created_at)[0]}}</td>
    <td>{{$order->amount."Ks"}}</td>
    <td>
      <i class='bx bx-dots-horizontal-rounded' id={{$order->id}}></i>
      {{-- <i class='bx bx-x'></i> --}}
    </td>
  </tr>
@endforeach
