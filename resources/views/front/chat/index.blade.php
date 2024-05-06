@include('layouts/header')
@section('title', 'Chat')
@include('front.chat.users', ['users'=>$users])

@include('layouts/footer')
