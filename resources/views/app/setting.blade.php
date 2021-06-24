<script type="text/javascript" src="js/setting.js"></script>
<div class="setting">
  <i class='bx bx-x'></i>
  <div class="pp">
    <img 
    src='{{$user && $user->img?"storage/avatar/".$user->img:"storage/avatar/avatar-outline.png"}}'
    alt="" id="profile">
    <i class='bx bx-camera'></i>
  </div>
  <form class="" action="index.html" method="post">
    <div class="form_gp">
      <input type="file" id="img_picker" name="img_picker" style="position:absolute;display:none">
      <fieldset>
        <label for="name">Username</label>
        <div class="textField">
          <input
          value="{{$user->name}}" 
          id="name" 
          type="text" 
          name="name"  
          autocomplete="name" 
          placeholder="e.g.Auguestin Joseph">
        </div>
        <label for="name"  class="msg">
        </label>
      </fieldset>
      <fieldset>
        <label for="email">Email</label>
        <div class="textField">
          <input
          disabled
          value="{{$user->email}}"  
          type="text" 
          name="email"   
          autofocus 
          placeholder="e.g.auguestin304@gmail.com">
        </div>
        <label for="email"  class="msg">
        </label>
      </fieldset>
      <fieldset>
        <label for="phone">Phone</label>
        <div class="textField">
          <input
          value="{{$user->phone}}"  
          type="text" 
          name="phone"   
          autofocus 
          placeholder="e.g.09448957137">
        </div>
        <label for="phone"  class="msg">
        </label>
      </fieldset>
      <fieldset>
        <label for="address">Address</label>
        <div class="textField">
          <input
          value="{{$user->address}}"  
          type="text" 
          name="address"   
          autofocus 
          placeholder="e.g 29,Min Ye Kyaw Swa Road,Dagon">
        </div>
        <label for="address"  class="msg">
        </label>
      </fieldset>
    </div>
    <div class="form_btn_gp">
      <span id="save_userinfo">Save</span>
      <span class="change_pwd">Change password</span>
    </div>
  </form>
</div>
