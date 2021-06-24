<script type="text/javascript" src="../js/pos/exchange.js"></script>
<div class="exchange">
  <i class='bx bx-x'></i>
  <h3>Enter withdraw information</h3>
  <h4 for={{$max}} id="max">Balance:{{$max."Ks"}}</h4>
  <h4>Select payment method</h4>
  <div class="payments">
    <p class="payment" id="Coinbase">
      <i class='bx bx-radio-circle'></i>Coinbase
    </p>
    <p class="payment" id="WavePay">
      <i class='bx bx-radio-circle'></i>WavePay
    </p>
    <p class="payment" id="OK$">
      <i class='bx bx-radio-circle'></i>OK$
    </p>
    <p class="payment" id="KBZPay">
      <i class='bx bx-radio-circle'></i>KBZPay
    </p>
  </div>
  <input type="text" name="address" placeholder="Enter phone or email associate with payment">
  <input type="text" name="amount" placeholder="Enter amount in Ks">
  <label for="amount" class="errMsg">Error Msg Here</label>
  <input type="button" name="submit" value="Request Withdraw">
</div>
