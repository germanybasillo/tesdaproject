<x-guest-layout>
    <!-- Session Status -->
   
       <!-- Login Form -->
<form class="login100-form" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-title p-b-43">Login to continue</span>
        
       <!-- Email Field with Validation Error in data-validate -->
       <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" 
         @error('email') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="email" name="email" value="{{ old('email') }}">
        <span class="focus-input100"></span>
        <span class="label-input100">Email</span>
    </div>

    <!-- Password Field with Validation Error in data-validate -->
    <div class="wrap-input100 validate-input @error('password') alert-validate @enderror" 
         @error('password') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="password" name="password">
        <span class="focus-input100"></span>
        <span class="label-input100">Password</span>
    </div>


    <div class="flex-sb-m w-full p-t-3 p-b-32">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
            <label class="label-checkbox100" for="ckb1">Remember me</label>
        </div>

        <div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="txt1">Forgot Password?</a>
            @endif
        </div>
    </div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">Login</button>
    </div>

    <div class="container-login100-form-btn p-t-10">
    <button type="button" class="login100-form-btn" onclick="window.location.href='{{ route('register') }}'">Create an Account</button>
</div>

</form>

</x-guest-layout>
