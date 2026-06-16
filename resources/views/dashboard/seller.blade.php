<h1>Seller {{ auth()->user()->name }} Dashboard</h1>

<form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>