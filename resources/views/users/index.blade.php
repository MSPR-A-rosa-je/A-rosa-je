<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E0E1E1;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        .header,
        .footer {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        button {
            font-family: monospace;
            background-color: #f3f7fe;
            color: #3b82f6;
            border: none;
            border-radius: 8px;
            width: 100px;
            height: 45px;
            transition: .3s;
            font-size: 125%;
        }

        button:hover {
            background-color: #3b82f6;
            box-shadow: 0 0 0 5px #3b83f65f;
            color: #fff;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Users</h2>
            <a href="{{ route('users.create') }}" class="button">
            <button class="button">New user</button>
            </a>
        </div>
        @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
        @endif
        <div style="margin-bottom: 20px;">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->pseudo }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button href="{{ route('users.show', $user->id) }}" class="button">Show</button>
                        <button href="{{ route('users.edit', $user->id) }}" class="button">Edit</button>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>
