
<div class="item_view">
    <i class='bx bx-x'></i>
    <div class="left">
    </div>
    <div class="middle">
      <div class="title">
        <input type="text" value={{$name}}>
        <span>
          <i class='bx bxs-heart active'></i>
          <span>{{$likes}}</span>
        </span>
      </div>
      <div class="current_item_img">
        <img alt="">
      </div>
    </div>
    <div class="right">
      <div class="detail">
        <p>
          <span>Description</span>
          <br>
          <h5>
            {{$desc}}
          </h5>
        </p>
      </div>
        <div class="checkout">
          <h2>Modify product</h2>
          <div class="price__root">
            <input type="text" id="price"><span>Ks</span>
          </div>
          <p class="size">
            @foreach ($sizes as $key => $value)
              <span data="{{json_encode($value)}}">{{$key}}</span>
            @endforeach
          </p>
          <p class="color">
          </p>
          <p class="qty">
            <span><i class='bx bx-minus'></i></span>
            <span class="qtyC" contenteditable="true">1</span>
            <span><i class='bx bx-plus'></i></span>
          </p>
          <span class="update_product" id={{$id}}>Update product</span>
          <span class="drop_product"   id={{$id}}>Drop Entire Product from store</span>
        </div>
    </div>
</div>
  