<x-guest-layout>
    <form class="login100-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <span class="login100-form-title p-b-43">Forget password</span>
        
    <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
    
    <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')"/>

       <!-- Email Field with Validation Error in data-validate -->
       <div class="wrap-input100 validate-input @error('email') alert-validate @enderror" 
         @error('email') data-validate="{{ $message }}" @enderror>
        <input class="input100" type="email" name="email" value="{{ old('email') }}">
        <span class="focus-input100"></span>
        <span class="label-input100">Email</span>
    </div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">Email Password Reset Link</button>
    </div>

    
    <div class="container-login100-form-btn p-t-10">
        <button type="button" class="login100-form-btn" onclick="window.location.href='{{ route('login') }}'">Back to login</button>
    </div>

</form>
</x-guest-layout>
