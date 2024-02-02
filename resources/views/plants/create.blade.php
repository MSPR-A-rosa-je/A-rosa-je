@include('header')
<body>
<h2>Create Plant</h2>
<form action="/plants" method="POST">
    @csrf


    <label for="specie-name">Specie Name:</label>
    <input type="text" id="specie-name" name="specie-name" required><br><br>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" required><br><br>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br><br>

    <label for="url_photo">URL Photo:</label>
    <input type="text" id="url_photo" name="url_photo" required><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
