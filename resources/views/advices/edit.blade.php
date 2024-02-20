@include('admin')

<body>
<h2>Edit Advice</h2>
<form action="/advices/{{ $advice->id }}" method="POST">
    @method('PATCH')
    @csrf

    <label for="id">ID:</label>
    <p></p>{{ $advice->id }}</p>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $advice->title}}"><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" value="{{ $advice->description}}"=><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" value="{{$advice->owner_id}}"><br><br>

    <label for="like_number">Number of Likes:</label>
    <input type="text" id="like_number" name="like_number" value="{{ $advice->like_number}}"><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
