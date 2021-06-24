  <script type="text/javascript" src="../js/storeById.js"></script>
  <link rel="stylesheet" href="../css/store.css">
    <div class="store">
      <div class="store--title">
        <i class='bx bx-arrow-back'></i>
        <div class="store--logo">
          <img src={{'../storage/shop/'.$shop->img}}>
        </div>
        <div class="store--review">
          <div class="store--actions">
            <h2>{{$shop->name}}</h2>
            @guest
              <p class="rating">
              @else<p class="rating clickable">
            @endguest
              @for ($i=1; $i < 6; $i++)
                @if ($i<=$shop->rate)
                 <i class="bx bxs-star" id={{$i}}></i>
                @else
                  <i class="bx bx-star" id={{$i}}></i>
                @endif
              @endfor
              <span>{{$shop->avg_rating}}</span>
            </p>
            @auth
                <p id={{$shop->id}} class="subscribe--btn {{$shop->subscribed?'unsubscribe':'subscribe'}}">{{$shop->subscribed?'Unsubscribe':'Subscribe'}}</p>
            @endauth
          </div>
          <p class="desc">{{$shop->description}}</p>
          <div class="review">
            <p class="subscribers">{{$shop->subscribes." Subscriber".($shop->subscribes>1?"s":"")}}</p>
            <p class="product_count">{{$shop->products." Product".($shop->products>1? "s":"")}}</p>
            <p class="product_count">{{$shop->sales." Sale".($shop->sales>1?"s":"")}}</p>
          </div>
        </div>
      </div>
      <div class="store--products">
        @foreach ($product as $key => $item)
          <div class="item_card" id="{{$item->id}}">
            <div class="top">
              <span>{{$item->name}}</span>
              <i class='bx bx-info-circle'></i>
            </div>
            <div class="offer">
              {{-- <span>15<i class='bx bxs-offer'></i></span> --}}
            </div>
            <img src="storage/products/{{$item->img}}" alt="">
            <div class="bottom">
              <span class="price">{{$item->price}}</span>
              <p>
                <span class="likes">
                  <i class='bx bxs-heart'  id={{$item->id}}></i>
                  {{$item->likes}}
                </span>
              </p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
