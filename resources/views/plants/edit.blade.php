@include('admin')

<body>
<h2>Edit Plant</h2>
<form action="/plants/{{ $plant->id }}" method="POST">
    @method('PATCH')
    @csrf

    <label for="id">ID:</label>
    <p></p>{{ $plant->id }}</p>

    <label for="specie_name">Specie Name:</label>
    <input type="text" id="specie_name" name="specie_name" value="{{ $plant->specie_name}}"><br><br>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" value="{{ $plant->location}}"=><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" value="{{$plant->owner_id}}"><br><br>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" value="{{ $plant->status}}"><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" value="{{ $plant->description}}"><br><br>

    <label for="url_photo">URL Photo:</label>
    <input type="text" id="url_photo" name="url_photo" value="{{ $plant->url_photo}}"><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
