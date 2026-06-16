<h1>Customer {{ auth()->user()->name }} Dashboard</h1>
<a href="/">Home</a>
&nbsp;|&nbsp;
<form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>