<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
        {{ __('Clientes') }}
    </x-nav-link>
    <x-nav-link :href="route('contracts.index')" :active="request()->routeIs('contracts.*')">
        {{ __('Contratos') }}
    </x-nav-link>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.*')">
            {{ __('Clientes') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('contracts.index')" :active="request()->routeIs('contracts.*')">
            {{ __('Contratos') }}
        </x-responsive-nav-link>
    </div>
</div> 