<h1>Sign In</h1>

<form action="/signin" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Sign In</button>
</form>

<br>
<a href="/signup">Don't have an account? Sign up here.</a>