<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="../css/pos.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/boxicons/css/boxicons.min.css">
    <script type="text/javascript" src="../js/pos/index.js"></script>
  </head>
  <body>
    <div class="pages">
      <nav>
        <h2>Overview dashboard</h2>
        <img src={{$shop->img?"../storage/shop/".$shop->img:"../storage/shop/shop.png"}} alt="" class="pp_img">
      </nav>
      <div class="kit">
        <i class='bx bxs-t-shirt' id="product">Product</i>
        <i class='bx bxs-truck'   id="order">Order</i>
        <i class='bx bx-export'   id="exchange">Withdraw money</i>
        <i class='bx bx-cog'      id="setting">Setting</i>
      </div>
      <div class="grid">
        <div class="grid_col">
          <div class="overview store_status">
            <h3>Current status</h3>
            <div class="card_row">
              <div class="card primary">
                <i class='bx bxs-t-shirt'></i>
                {{$shop->productQty."Products"}}
              </div>
              <div class="card heart">
                <i class='bx bx-dollar-circle' ></i>
                {{$shop->balance." Ks"}}
              </div>
              <div class="card success">
                <i class='bx bxs-truck' ></i>
                {{$shop->pendingOrders." Orders"}}
              </div>
            </div>
          </div>
          <div class="overview total_sales">
            <h3>Total Sales</h3>
            <p>
              <i class='money' >00000</i>
              <i class='bx indicator'>0%</i>
            </p>
            <h5>Sales overtime</h5>
            <div id="chart"></div>
          </div>
        </div>
        <div class="grid_col">
          <div class="overview store_session">
            <h3>Store session</h3>
            <p class="trible_row">
              <i>Visitor</i>
              <i class="visitor">0</i>
              <i class='bx visitor-indicator'>0</i>
            </p>
            <p class="trible_row">
              <i>Subscriber</i>
              <i class="subscriber">0</i>
              <i class='bx subscriber-indicator'>0</i>
            </p>
            <h5>Session overtime</h5>
            <div id="chart"></div>
          </div>
          <div class="overview average_value">
            <div class="title">
              <h3>Avergae order value</h3>
              {{-- <p class="btn">View orders</p> --}}
            </div>
            <p>
              <i class='bx avg' >00000</i>
            </p>
            <div id="chart"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="popover">
    </div>
  </body>
</html>
