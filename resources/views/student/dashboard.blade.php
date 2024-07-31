
@if (session()->has('error'))
    <h3 sty>{{session('error')}}</h3>
@endif

<h1>Student Dashboard</h1>


<p>Welcome::   {{ Auth::user()->name }}</p>
<p>Email::    {{ Auth::user()->email }}</p>
<p>Role::   {{ Auth::user()->role }}</p>
   
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-primary-button type="submit">
        {{ __('Logout') }}
    </x-primary-button>
</form>