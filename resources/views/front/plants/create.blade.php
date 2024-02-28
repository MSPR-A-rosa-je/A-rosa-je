@include ('layouts/header')
@section ('title', 'Create Plant')
<form autocomplete="off" action="/plants" method="POST">
    @csrf
    <div style="display: flex; align-items: center; flex-direction: column;">
        <h2 style="width: 100%; text-align: center;">Create Plant </h2>
        <div style="display: flex; flex-direction: column; gap:2em;">
            <div>
                <label for="specie_name">Specie Name:</label>
                <input type="text" id="specie_name" name="specie_name" required>
            </div>
            <div>
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>

            <div>
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required>
            </div>

            <div>
                <label for="url_photo">Photo:</label>
                <input type="file" id="url_photo" name="url_photo" accept="image/jpeg, image/png" required>
            </div>

            <div>
                <button class="button" type="submit" style="color:#f0c808;background-color: #232C33; margin:2% 0 20% 5%">Create</button>
            </div>

        </div>
    </div>
</form>




@include('layouts/footer')
