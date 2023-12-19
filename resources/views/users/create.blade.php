@include('header')
<body>
<h2>Create User</h2>
    <form action="/users" method="POST">
        @csrf

        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="birth_date">Birth Date:</label>
        <input type="date" id="birth_date" name="birth_date" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button class="button" type="submit"">Submit</button>
    </form>
</body>
</body>
