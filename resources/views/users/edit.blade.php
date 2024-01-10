@include('header')
<body>
<h2>Edit User</h2>
    <form action="/users" method="POST">
        @method('PUT')
        @csrf

        <label for="id">ID:</label>
        <p></p>{{ $user->id }}</p>

        <p></p>{{ $user->pseudo}}</p>
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo"><br><br>

        <p>{{ $user->first_name}}</p>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br><br>

        <p>{{ $user->last_name}}</p>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br><br>

        <p>{{ $user->email}}</p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <p>{{ $user->birth_date}}</p>
        <label for="birth_date">Birth Date:</label>
        <input type="date" id="birth_date" name="birth_date"><br><br>

        <p>{{ $user->phone_number}}</p>
        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number"><br><br>

        <p>{{ $user->is_botanist}}</p>
        <label for="is_botanist">Is Botanist:</label>
        <input type="checkbox" id="is_botanist" name="is_botanist"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <button class="button" type="submit"">Submit</button>
    </form>
</body>
</body>
