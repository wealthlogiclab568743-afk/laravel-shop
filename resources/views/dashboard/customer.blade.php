<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
</head>
<body>
    
<h1>Customer {{ auth()->user()->name }} Dashboard</h1>
<p>Balanced: ${{ auth()->user()->balance }}</p>

<hr>

<a href="/">Home</a>
&nbsp;|&nbsp;
<a href="/history">My Purchase History</a>
&nbsp;|&nbsp;
<form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>