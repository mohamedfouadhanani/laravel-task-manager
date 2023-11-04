@php
    $email = auth()->user()->email;
    $name = auth()->user()->name;
@endphp

<section class="relative p-2">
    <section>
      <button id="profile-dropdown-btn" class="mt-0.5 relative flex rounded-full bg-white text-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" id="user-menu-button">
        <i class="fa-regular fa-circle-user"></i>
      </button>
    </section>
    <section id="profile-dropdown-list" class="text-black hidden absolute right-0 z-10 mt-2 origin-top-right rounded bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
        <section class="px-4 py-2 text-xs cursor-default">
            <span class="text-sm font-bold">{{ $name }}</span>
            <span>{{ $email }}</span>
        </section>
        @include('partials.profile-dropdown.link', ["href" => route("profile.index"), "text" => "Your Profile"])
        <x-form-as-button :form_route="$logout_route" method="post" class="cursor-pointer hover:bg-gray-100 block px-4 py-2 text-sm">
            @csrf
            <input type="submit" value="Sign out" class="cursor-pointer w-full text-left">
        </x-form-as-button>
    </section>
</section>