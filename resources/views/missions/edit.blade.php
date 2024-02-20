@include('admin')

<body>
<h2>Edit Mission</h2>
<form action="/missions/{{ $mission->id }}" method="POST">
    @method('PATCH')
    @csrf

    <label for="id">ID:</label>
    <p></p>{{ $mission->id }}</p>

    <label for="start_date">Date of Mission's Starting:</label>
    <input type="text" id="start_date" name="start_date" value="{{ $mission->start_date}}"><br><br>

    <label for="end_date">Date of Mission's Ending:</label>
    <input type="text" id="end_date" name="end_date" value="{{ $mission->end_date}}"=><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" value="{{$mission->owner_id}}"><br><br>

    <label for="candidates_list">List of Candidates:</label>
    <input type="text" id="candidates_list" name="candidates_list" value="{{ $mission->candidates_list}}"><br><br>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="{{ $mission->price}}"><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" value="{{ $mission->description}}"><br><br>

    <label for="gardien_id">Gardien ID:</label>
    <input type="text" id="gardien_id" name="gardien_id" value="{{$mission->gardien_id}}"><br><br>

    <label for="number_of_sessions">Number of Sessions:</label>
    <input type="text" id="number_of_sessions" name="number_of_sessions" value="{{$mission->number_of_sessions}}">

    <label for="plants_list">List of Plants</label>
    <input type="text" id="plants_list" name="plants_list" value="{{$mission->plants_list}}">

    <button class="button" type="submit"">Submit</button>
</form>
</body>
