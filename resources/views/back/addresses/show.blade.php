@include('back.admin')

<body>
    <div>
        <h2 class="logo">Profil of '{{ $address->id }}'</h2>
        <div class="adress-table">
            <table>
                <caption>Menu</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Zip Code</th>
                        <th>User ID</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="clickable-row">
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->address }}</td>
                        <td>{{$address->city}}</td>
                        <td>{{ $address->zip_code }}</td>
                        <td>{{ $address->user_id }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="/addresses" class="button" style="margin-right: 66em; margin-left: 2em">Back</a>
                <a class="button" href="{{route('addresses.edit', $address->id)}}">Edit</a>
                <button class="button" type="submit" onclick="return
                confirm('Are you sure you want to delete this address?');">
                    Delete
                </button>
            </form>
        </div>
    </div>
</body>
