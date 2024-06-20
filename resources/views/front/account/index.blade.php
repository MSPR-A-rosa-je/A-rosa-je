@include('layouts/header')
<head>
    <title>Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
          href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'
          viewBox='0 0 20 20'%3E%3Cpath d='M10 0C4.48 0 0 4.48 0 10s4.48
          10 10 10 10-4.48 10-10S15.52 0 10 0zM9
           15v-2H8v2H5V5h2V3h2v2h2v10h-2v-2H9v2zm5-10h-2V3h2v2zm0
            10h-2v2h-2v-2H7v2H5v-2H3v-2h2V7H3V5h2V3h2v2h2v10h-2v-2h
            -2v2H7v-2H5v2H3v-2h2v-2h2v2h2v-2h2v2h2V5h-2V3h2V1h-2V0z'
             fill='%2300FF00'/%3E%3C/svg%3E"
          type="image/svg+xml">
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    <style>

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .account-details {
            border: 1px solid #000;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            text-align: left;
        }

        .account-details p {
            margin: 10px 0;
        }

        .account-details strong {
            width: 100px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="account-details">
        <p><strong>First Name:</strong> {{ $user->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Pseudo:</strong> {{ $user->pseudo }}</p>
        <p><strong>Phone number:</strong> {{ $user->phone_number }}</p>
        <p><strong>Birth date:</strong> {{ $user->birth_date }}</p>
        <p><strong>Creation date:</strong> {{ $user->creation_date }}</p>
        <p><strong>Is botanist:</strong> {{ $user->is_botanist }}</p>
        <p><strong>Botanist since:</strong> {{ $user->botanist_since }}</p>
        <p><strong>Is admin:</strong> {{ $user->is_admin }}</p>
    </div>
</div>
</body>
@include('layouts/footer')
