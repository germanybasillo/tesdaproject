<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
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

<span class="login100-form-title p-b-43">Confirm Password</span>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
