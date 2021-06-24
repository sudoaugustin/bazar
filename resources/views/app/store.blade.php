<script type="text/javascript" src="js/store.js"></script>
@php
$i=0;
@endphp
@foreach ($shops as $key => $shop)
@if (count($shop)>0)
<div class="py-10 space-y-8">
  <div class="flex justify-between">
    <h3 class="uppercase text-lg font-medium tracking-tight">{{$key}}</h3>
    @if ($i===0)
    <span id="createStore">Create store<i class='bx bx-plus'></i></span>
    @php
    $i++
    @endphp
    @endif
  </div>
  <div class="grid grid-cols-4 gap-x-16 gap-y-14">
    @foreach ($shop as $value)
    <div class="bg-white rounded-md shadow p-5 space-y-10">
      <img class="h-40 mx-auto" src={{"storage/shop/".$value->img}} alt="">
      <div class="detail space-y-2">
        <h3 class="text-lg text-gray-900 font-semibold"> {{$value->name}} </h3>
        <p class="line-clamp-2 text-gray-700">{{$value->description}}</p>
        <div class="actions">
          @if ($key==="your store")
          <a class="goto" target="_blank" href={{"management/".$value->id}}>Go to store<i
              class='bx bx-link-external'></i></a>
          @else
          <a class="inline-block text-indigo-700 after:bg-indigo-400 after:bg-opacity-60 after:content-[''] after:block after:w-full after:h-1 after:-top-2 after:relative"
            id={{$value->id}}>Visit
            store</a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endif
@endforeach