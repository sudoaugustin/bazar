<script type="text/javascript" src="../js/exchange.js"></script>
<div class="exchange">
  <i class='bx bx-x'></i>
  <h3>Enter {{$type}} information</h3>
  <h4>Select payment method</h4>
  <div class="payments">
    <p class="payment" id="BALANCE">
      <i class='bx bx-radio-circle'></i>Account balance
    </p>
    <p class="payment" id="COD">
      <i class='bx bx-radio-circle'></i>Cash on delivery
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
  <input type="button" name="submit" value="Request {{$type}}">
</div>
