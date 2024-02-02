@include('admin')

<body>
<h2>Edit address</h2>
<form action="/addresses/{{ $address->id }}" method="POST">
    @method('PATCH')
    @csrf

    <label for="id">ID:</label>
    <p></p>{{ $address->id }}</p>

    <label for="address">Specie Name:</label>
    <input type="text" id="address" name="address" value="{{ $address->address}}"><br><br>

    <label for="city">city:</label>
    <input type="text" id="city" name="city" value="{{ $address->city}}"=><br><br>

    <label for="zip_code">Owner ID:</label>
    <input type="text" id="zip_code" name="zip_code" value="{{$address->zip_code}}"><br><br>

    <label for="user_id">User ID:</label>
    <input type="text" id="user_id" name="user_id" value="{{$address->user_id}}"><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
