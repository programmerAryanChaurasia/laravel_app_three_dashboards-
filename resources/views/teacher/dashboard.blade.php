
<h1>Teacher Dashboard</h1>

@if (session()->has('error'))
    <b><h3 style="red">{{session('error')}}</h3></b>
@endif

<p>Welcome::   {{ Auth::user()->name }}</p>
<p>Email::    {{ Auth::user()->email }}</p>
<p>Role::   {{ Auth::user()->role }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-primary-button type="submit">
        {{ __('Logout') }}
    </x-primary-button>
</form>