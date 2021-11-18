 <div x-data="{isDropdown:false}"
     class="ml-3 relative">
     <div>
         <button x-on:click="isDropdown=!isDropdown"
             type="button"
             class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
             id="user-menu-button"
             aria-expanded="false"
             aria-haspopup="true">
             <span class="sr-only">Open user menu</span>
             <img class="h-8 w-8 rounded-full"
                 src="{{ auth()->user()->profile_photo_url }}"
                 alt="">
         </button>
     </div>

     <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
     <div x-cloak
         x-show="isDropdown"
         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
         role="menu"
         aria-orientation="vertical"
         aria-labelledby="user-menu-button"
         tabindex="-1">
         <!-- Active: "bg-gray-100", Not Active: "" -->
         <x-jet-dropdown-link href="{{ route('profile.show') }}">
             {{ __('Profile') }}
         </x-jet-dropdown-link>
         <form method="POST"
             action="{{ route('logout') }}">
             @csrf

             <x-jet-dropdown-link href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                 {{ __('Log Out') }}
             </x-jet-dropdown-link>
         </form>
     </div>
 </div>
