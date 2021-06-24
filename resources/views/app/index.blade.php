<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script type="text/javascript" src="js/index.js"></script>
</head>

<body>
  <header
    class="flex sticky top-0 z-30 mx-auto bg-opacity-50 h-[72px] bg-gray-50 border-b backdrop-filter backdrop-blur max-w-8xl xl:px-8 firefox:bg-opacity-90">
    <div class="flex items-center justify-between w-full px-4 py-5 lg:px-8 sm:px-6">
      <section class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
            clip-rule="evenodd" />
        </svg>
        <p class=" text-4xl text-gray-900 font-semibold">{{ config('app.name') }}</p>
      </section>
      <fieldset class="relative">
        <nav class="flex p-2 rounded-md border items-center border-gray-200 w-[30rem]">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <input class="px-2 bg-transparent focus:outline-none w-full" type="text" name="search"
            placeholder="Search products">
          <i class='bx bxs-down-arrow filter-btn'></i>
        </nav>
        {{-- <div class="filterbox">
            <div class="category_tag">
              <h4>Category</h4>
              <p>
                <span class="c1">All</span>
                <span class="c2">Men's Fashion</span>
                <span class="c3">Women's Fashion</span>
                <span class="c4">Boy's Fashion</span>
                <span class="c5">Girl's Fashion</span>
                <span class="c6">Baby</span>
                <span class="c7">Phone</span>
                <span class="c8">Computer</span>
                <span class="c9">Gadget</span>
              </p>
            </div>
            <div class="brands_tag">
              <h4>Brand</h4>
              <p>
              </p>
            </div>
          </div>
          <div class="results">
            <p>Xoami Note 5</p>
            <p>Dell inspiration series</p>
            <p>Xoami Note 5</p>
            <p>Xoami Note 5</p>
            <p>Xoami Note 5</p>
          </div> --}}
      </fieldset>
      @php
      $Lists = [
      [
      'name' => 'explore',
      'id' => 'product',
      ],
      [
      'name' => 'shop',
      'id' => 'shop',
      ],
      ];
      $authLists = [
      [
      'name' => 'order',
      'id' => 'order',
      ],
      [
      'name' => 'cart',
      'id' => 'cart',
      ],
      ];
      @endphp
      @auth
      @php
      $Lists = array_merge($Lists, $authLists);
      @endphp
      @endauth
      <ul id="links" class="flex items-center space-x-8 font-medium capitalize">
        @foreach ($Lists as $list)
        <li id="{{ $list['id'] }}" class="cursor-pointer text-gray-800 hover:text-gray-400 duration-300">
          {{ $list['name'] }}
        </li>
        @endforeach
      </ul>
      <div class="nav_right">
        {{-- @auth
            <i class='bx bx-bell'></i>
          @endauth --}}
        {{-- <span>
            <img
            id="avatar"
            src='{{$user && $user->img?"storage/avatar/".$user->img:"storage/avatar/avatar-outline.png"}}'/>
        </span> --}}
        <div class="acc_kit">
          @guest
          <a class="py-0.5 px-2.5 rounded-full bg-gray-100 text-gray-600 flex items-center group" href="login">
            <span class="font-medium">Sign in</span>
            <svg class='w-2.5 h-2.5 relative top-[1px] ml-[5px] stroke-2 stroke-current' view-box='0 0 10 10'>
              <g fill-rule='evenodd'>
                <path class='opacity-0 group-hover:opacity-100 transition-opacity ease-out' d='M0 5h7'>
                </path>
                <path class='group-hover:translate-x-[3px] transition ease-in-out fill-[none]' d='M1 1l4 4-4 4'></path>
              </g>
            </svg>
          </a>
          @else
          <div class="acc_info">
            <span>
              <img id="avatar"
                src='{{ $user && $user->img ? 'storage/avatar/' . $user->img : 'storage/avatar/avatar-outline.png' }}' />
            </span>
            <h3>{{ $user->name }}</h3>
          </div>
          <div class="kit">
            <p id="setting"><i class='bx bx-cog'></i>Setting</p>
            {{-- <p id="exchange/deposit"><i class='bx bx-dollar-circle' ></i>Deposit</p>
              <p id="exchange/withdraw"><i class='bx bxs-bank' ></i>Withdraw</p> --}}
            <p id="logout"><i class='bx bx-log-out'></i></i>Logout</p>
            {{-- <p id="support"><i class='bx bx-help-circle' ></i>Support</p> --}}
          </div>
          @endguest
        </div>
      </div>
    </div>
  </header>
  <div class="app_body">
    <div class="pages px-8 xl:px-16 bg-gray-50"></div>
    <div class="popover"></div>
  </div>
</body>

</html>