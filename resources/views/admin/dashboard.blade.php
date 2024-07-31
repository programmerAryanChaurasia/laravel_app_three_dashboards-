
@if (session()->has('error'))
    <h3 style="red">{{session('error')}}</h3>
@endif
<h1>Admin Dashboard</h1>

<p>Welcome::   {{ Auth::user()->name }}</p>
<p>Email::    {{ Auth::user()->email }}</p>
<p>Role::   {{ Auth::user()->role }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-primary-button type="submit">
        {{ __('Logout') }}
    </x-primary-button>
</form>