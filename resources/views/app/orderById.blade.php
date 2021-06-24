<div class="voucher">
  <h2>Voucher</h2>
  <span><i class='bx bx-x'></i></span>
  <div class="cupon">
    <i class='bx bxs-coupon'></i>
    <p>{{"#".$order->id}}</p>
  </div>
  <div class="recipe">
    <table>
      <tr>
        <th style="text-align:left">Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Qty</th>
        <th>Price</th>
      </tr>
      @foreach ($items as $item)
        <tr>
          <td style="text-align:left">{{$item->name}}</td>
          <td>{{$item->size}}</td>
          <td style="text-transform:capitalize">{{$item->color}}</td>
          <td>{{$item->qty}}</td>
          <td>{{$item->price."Ks"}}</td>
        </tr>
      @endforeach
      <tr>
        <td colspan="4">Total:</td>
        <td>{{$order->amount."Ks"}}</td>
      </tr>
      <tr>
        <td colspan="4">Payment method:</td>
        <td>{{$order->payment_method}}</td>
      </tr>
      <tr>
        <td colspan="4">Status:</td>
        <td class="paid" style="text-transform:capitalize">{{$order->status}}</td>
      </tr>
    </table>
  </div>
</div>