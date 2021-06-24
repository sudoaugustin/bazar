<script type="text/javascript" src="../js/pos/setting.js"></script>
<div class="setting">
  <i class='bx bx-x'></i>
  <div class="pp">
    <img src={{"../storage/shop/".$shop->img}} alt="" id="profile">
    <i class='bx bx-camera'></i>
  </div>
  <form>
    <div class="form_gp">
      <input type="file" id="img_picker" name="img_picker" style="position:absolute;display:none">
      <fieldset>
        <label for="name">Shop name</label>
        <div class="textField">
          <input value="{{$shop->name}}" id="name" type="text" name="name"  autocomplete="name" placeholder="e.g.Puma">
        </div>
        <label for="name"  class="msg">
        </label>
      </fieldset>
      <fieldset>
        <label for="desc">Shop Description</label>
        <div class="textField">
          <textarea name="desc" id="" cols="30" rows="3" placeholder="Description">{{$shop->description}}</textarea>
        </div>
        <label for="desc"  class="msg">
        </label>
      </fieldset>
      <fieldset>
        <label for="address">Shop address</label>
        <div class="textField">
          <input value="{{$shop->address}}"type="text" name="address"   autofocus placeholder="e.g 29,Min Ye Kyaw Swa Road,Dagon">
        </div>
        <label for="address"  class="msg">
        </label>
      </fieldset>
    </div>
    <div class="form_btn_gp">
      <span id="save">Save</span>
      @if($shop->offical== 0)
        <span class="req_btn" id={{$shop->id}}>Request Offical Verification</span>
      @endif
    </div>
  </form>
</div>
