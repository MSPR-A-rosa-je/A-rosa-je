<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        body {
            font-family: monospace;
            margin: 0;
            padding: 0;
            background-color: #E0E1E1;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            text-align: center;
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

        .feed-form {
            margin-top: 36px;
            display: flex;
            flex-direction: column;
            width: 420px;
        }

        .feed-form input {
            font-family: monospace;
            height: 42px;
            border-radius: 5px;
            background: white;
            margin-bottom: 15px;
            border: none;
            padding: 0 20px;
            font-weight: 300;
            font-size: 14px;
            color: #4B4B4B;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Users</h2>
            <a href="{{ route('users.index') }}" class="button">
                <button href="{{ route('users.index') }}" class="button">Back to users</button>
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
        <div style="display: inline-block;">
            <section style="margin-bottom: 20px;">
                <form class="feed-form" method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <input type="text" name="pseudo" placeholder="Pseudo" required>
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="date" name="birth_date" placeholder="Birth Date" required>
                    <input type="password" name="password" placeholder="Password" required>

                    <button class="button" type="submit" style="margin-left: 10px;">Submit</button>
                </form>
</body>
</head>

</html>
