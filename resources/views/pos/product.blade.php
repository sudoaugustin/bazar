<script type="text/javascript" src="../js/pos/product.js"></script>
<div class="product--root">
  <i class='bx bx-x'></i>
  <p class="products--upload">
    <span>Products</span>
    <i class='bx bx-plus'>Upload new product</i>
  </p>
  <div class="products--show">
    @foreach ($products as $product)
      <div class="item_card" id="{{$product->id}}">
        <div class="top">
          <span>{{$product->name}}</span>
          <i class='bx bx-edit' ></i>
        </div>
        <img src="../storage/products/{{$product->img}}">
        <div class="bottom">
          <span class="price">{{$product->price}}</span>
          <p>
            <span class="likes">
              <i class='bx bxs-heart'  id={{$product->id}}></i>
              {{$product->likes}}
            </span>
          </p>
        </div>
      </div>
    @endforeach
  </div>
</div>
