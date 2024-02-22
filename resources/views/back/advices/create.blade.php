@include('back.admin')
<body>
<h2>Create advice</h2>
<form action="/advices" method="POST">
    @csrf

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br><br>

    <label for="owner_id">Owner ID:</label>
    <input type="text" id="owner_id" name="owner_id" required><br><br>

    <label for="like_number">Number of Likes:</label>
    <input type="text" id="like_number" name="like_number" required><br><br>

    <button class="button" type="submit"">Submit</button>
</form>
</body>
