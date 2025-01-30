<x-guest-layout>
    
<!-- Email Verification and Logout Form -->
<form class="login100-form" method="POST" action="{{ route('verification.send') }}">
    @csrf
    <span class="login100-form-title p-b-43">Email Verification</span>

    <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn’t receive the email, we will gladly send you another.</p>

      <!-- Verification Email Sent Message -->
      @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

     <!-- Resend Verification Email Button -->
    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">Resend Verification Email</button>
    </div>

    <!-- Logout Button with Margin -->
    <div class="container-login100-form-btn" style="margin-top: 10px;">
        <button type="submit" formaction="{{ route('logout') }}" class="login100-form-btn">Logout</button>
    </div>
</form>


</x-guest-layout>
