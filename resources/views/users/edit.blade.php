@include('admin')

<body>
    <h2>Edit User</h2>
    <form action="/users/{{ $user->id }}" method="POST">
        @method('PATCH')
        @csrf

        <label for="id">ID:</label>
        <p></p>{{ $user->id }}</p>

        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" value="{{ $user->pseudo}}"><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="{{ $user->first_name}}"=><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="{{ $user->last_name}}"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email}}"><br><br>

        <label for="birth_date">Birth Date:</label>
        <input type="date" id="birth_date" name="birth_date" value="{{ $user->birth_date}}"><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" value="{{ $user->phone_number}}"><br><br>

        <label for="is_botanist">Is Botanist:</label>
        <input type="checkbox" id="is_botanist" name="is_botanist" value="{{ $user->is_botanist}}"><br><br>

        <label for="is_admin">Is Admin:</label>
        <input type="checkbox" id="is_admin" name="is_admin" value="{{ $user->is_admin}}"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{ $user->password}}"><br><br>

        <button class="button" type="submit"">Submit</button>
    </form>
</body>
</body>
