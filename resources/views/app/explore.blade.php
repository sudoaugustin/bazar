<script type="text/javascript" src="js/explore.js"></script>
@foreach ($products as $key=>$product)
@if ($product)
<div class="py-10 space-y-8">
  <h3 class="uppercase text-lg font-medium tracking-tight">{{$key}}</h3>
  <div class="grid grid-cols-3 gap-x-16 gap-y-14">
    @foreach ($product as $item)
    @if ($item)
    <div class="space-y-4">
      <img id="{{$item->id}}" class="rounded-md cursor-pointer hover:shadow-md duration-300 ease-in-out item"
        src="storage/products/{{$item->img}}">
      <div class="space-y-2 font-medium">
        <p>{{$item->name}}</p>
        <p class="text-gray-700">{{$item->price}} Ks</p>
      </div>
    </div>
    @endif
    @endforeach
  </div>
</div>
@endif
@endforeach