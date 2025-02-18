<x-guest-layout>
    <form class="login100-form" method="POST" action="{{ route('password.store') }}">
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
  <img src="bagongpili.png" alt="My GIF" width="300" style="margin-left: -50px;">
</div>

<span class="login100-form-title p-b-43">Reset Password</span>

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Field with Validation Error in data-validate -->
    <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" 
         @error('email') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="email" name="email" value="{{ old('email', request('email')) }}">
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


    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">Reset Password</button>
    </div>

    <div class="container-login100-form-btn p-t-10">
    <button type="button" class="login100-form-btn" onclick="window.location.href='{{ route('login') }}'">Back to Login</button>
</div>
    </form>
</x-guest-layout>
