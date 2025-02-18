<x-guest-layout>

<form class="login100-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf

    <style>
  .image-container {
    display: flex;
    margin-top:-29%;
    align-items: center; /* Align images in the middle */
    margin-left:120px;
  }
</style>

<div class="image-container">
  <img src="tesdabg.gif" alt="My GIF" width="300">
  <img src="bagongpili.png" alt="My GIF" width="300">
</div>
    <span class="login100-form-title p-b-43">Create an Account</span>

      <!-- Name Field with Validation Error in data-validate -->
      <div class="wrap-input100 validate-input @error('name') alert-validate @enderror" 
         @error('name') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="name" name="name" value="{{ old('name') }}">
        <span class="focus-input100"></span>
        <span class="label-input100">Name of Institution</span>
    </div>

    <!-- Email Field with Validation Error in data-validate -->
    <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" 
         @error('email') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="email" name="email" value="{{ old('email') }}">
        <span class="focus-input100"></span>
        <span class="label-input100">Email</span>
    </div>

      <!-- Email Field with Validation Error in data-validate -->
      <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" 
         @error('password') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="password" name="password" value="{{ old('password') }}">
        <span class="focus-input100"></span>
        <span class="label-input100">Password</span>
    </div>

  <!-- Email Field with Validation Error in data-validate -->
  <div class="wrap-input100 validate-input @error('password_confirmation') alert-validate @enderror" 
         @error('password_confirmation') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
        <span class="focus-input100"></span>
        <span class="label-input100">Confirm Password</span>
    </div>

    <!-- Profile Image Upload -->
<div style="text-align: center; margin-bottom: 15px;">
<label for="logo-upload" id="logo-container" style="
            display: inline-block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px dashed #ccc;
            overflow: hidden;
            cursor: pointer;
            position: relative;">
        
        <!-- Upload Text (Centered) -->
        <span id="upload-text" style="
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 12px;
                color: #888;">Upload Logo of Institution</span>
        
        <!-- Hidden Image (Becomes Visible on Upload) -->
        <img id="logo-preview" src="" alt="Upload Logo" style="
                 width: 100%;
                height: 100%;
                object-fit: cover;
                display: none;">
    </label>
    <input type="file" name="logo" id="logo-upload" accept="image/*" style="display: none;">
</div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">Register</button>
    </div>

    <div class="container-login100-form-btn p-t-10">
        <button type="button" class="login100-form-btn" onclick="window.location.href='{{ route('login') }}'">Already have an account? Login</button>
    </div>
</form>

</x-guest-layout>
