 <x-card class="py-5 px-3 md:px-5">
     <header>
         <h2 class="text-lg font-medium  ">
             {{ __('Update Password') }}
         </h2>

         <p class="mt-1 text-sm text-gray-500 ">
             {{ __('Ensure your account is using a long, random password to stay secure.') }}
         </p>
     </header>

     <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
         @csrf
         @method('put')

         @if (auth()->user()->password)
             <div>
                 <x-input.label for="current_password" :value="__('Current Password')" />
                 <x-input.text id="current_password" name="current_password" type="password" class="mt-1 block w-full"
                     autocomplete="current-password" />
                 <x-input.error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
             </div>
         @endif


         <div>
             <x-input.label for="password" :value="__('New Password')" />
             <x-input.text id="password" name="password" type="password" class="mt-1 block w-full"
                 autocomplete="new-password" />
             <x-input.error :messages="$errors->updatePassword->get('password')" class="mt-2" />
         </div>

         <div>
             <x-input.label for="password_confirmation" :value="__('Confirm Password')" />
             <x-input.text id="password_confirmation" name="password_confirmation" type="password"
                 class="mt-1 block w-full" autocomplete="new-password" />
             <x-input.error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
         </div>

         <div class="flex items-center gap-4">
             <x-button.primary>{{ __('Save') }}</x-button.primary>

             @if (session('status') === 'password-updated')
                 <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                     class="text-sm text-gray-500 ">{{ __('Saved.') }}</p>
             @endif
         </div>
     </form>
 </x-card>
