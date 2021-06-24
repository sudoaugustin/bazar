<script type="text/javascript" src="js/productById.js"></script>
<div class="fixed inset-0 flex items-center justify-center z-10 bg-gray-100 bg-opacity-75">
  <div class="item_view flex p-5 space-x-5 bg-white rounded-md w-full max-w-screen-lg shadow-md relative">
    <i id="close_btn" class="cursor-pointer text-gray-900 hover:text-gray-600 absolute top-2 right-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
          clip-rule="evenodd" />
      </svg>
    </i>
    <div class="left w-32 h-full bg-gray-100 rounded-md overflow-hidden"> </div>
    <div class="middle w-full">
      <div class="title flex justify-between">
        <span class="text-lg text-gray-900">{{ $name }}</span>
        <span>
          @if ($liked)
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
              clip-rule="evenodd" />
          </svg>
          @else
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
          @endif
        </span>
      </div>
      <div class="current_item_img">
        <img alt="">
      </div>
    </div>
    <div class="right w-[28rem]">
      <div class="detail">
        <p>Store:
          <a id={{ $shop->id }} class="shopBtn">{{ $shop->name }}</a>
        </p>
        <p id="price"></p>
        <p>Available:
          <span class="available"></span>
        </p>
        <p>
          <span>Description</span>
          <br>
          <h5>
            {{ $desc }}
          </h5>
        </p>
        {{-- <ul class="spec">
            @foreach ($specs as $spec)
            <li>{{ $spec }}</li>
        @endforeach
        </ul> --}}
      </div>
      <div class="checkout">
        <p class="size space-x-4">
          @foreach ($sizes as $key => $value)
          <span class="text-sm font-medium rounded-md" data="{{ json_encode($value) }}">{{ $key }}</span>
          @endforeach
        </p>
        <p class="color">
        </p>
        @auth
        <p class="qty">
          <span><i class='bx bx-minus disable'></i></span>
          <span class="qtyC">1</span>
          <span><i class='bx bx-plus'></i></span>
        </p>
        <span class="add_to_cart" id={{ $id }}>Add to cart</span>
        @endauth
      </div>
    </div>

  </div>
</div>