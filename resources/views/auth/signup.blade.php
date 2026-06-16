<h1>Sign Up</h1>

<form action="/signup" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="customer">Customer</option>
            <option value="seller">Seller</option>
        </select>
    </div>
    <button type="submit">Sign Up</button>
</form>

<br>
<a href="/login">Already have an account? Log in here.</a>