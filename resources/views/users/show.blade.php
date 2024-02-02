@include('header')
<body>
    <div>
        <h2 class="logo">Profil of '{{ $user->pseudo }}'</h2>
        <div class="user-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Birth date</th>
                    <th>Is botanist</th>
                    <th>Creation date</th>
                    <th>Botanist since</th>
                    <th>Address id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="clickable-row">{{ $user->id }}</td>
                    <td class="clickable-row">{{ $user->first_name }}</td>
                    <td class="clickable-row">{{ $user->last_name }}</td>
                    <td class="clickable-row">{{ $user->phone_number }}</td>
                    <td class="clickable-row">{{ $user->email }}</td>
                    <td class="clickable-row">{{ $user->birth_date->format('d/m/Y') }}</td>
                    <td class="clickable-row">{{ $user->is_botanist ? 'Yes' : 'No' }}</td>
                    <td class="clickable-row">{{ $user->creation_date->format('d/m/Y H:i') }}</td>
                    <td class="clickable-row">{{ $user->botanist_since ? $user->botanist_since->format('d/m/Y') : 'N/A' }}</td>
                    <td class="clickable-row">{{ $user->address_id }}</td>
                </tr>
            </tbody>
        </table>
        </div>
        <div>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/users" class="button" style="margin-right: 66em; margin-left: 2em">Back</a>
            <a class="button" href="{{route('users.edit', $user->id)}}">Edit</a>
            <button class="button" type="submit" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
        </form>
        </div>
    </div>
</body>
