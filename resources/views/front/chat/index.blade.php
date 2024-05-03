@include('layouts/header')
@section('title', 'Chat')
<div class="col-md-3">

    <div class="list-group">
        @foreach($users as $user)
        <a class="list-group-item" href="{{ route('chat.show', $user->id) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
        @endforeach
    </div>

</div>

@include('layouts/footer')
