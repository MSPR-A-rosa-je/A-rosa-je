@include('admin')
<body>
<h2>Create Address</h2>
<form action="/addresses" method="POST">
    @csrf


    <label for="adress">Adress:</label>
    <input type="text" id="adress" name="adress" required><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required><br><br>

    <label for="zip_code">Zip Code:</label>
    <input type="text" id="zip_code" name="zip_code" required><br><br>


    <button class="button" type="submit"">Submit</button>
</form>
</body>
