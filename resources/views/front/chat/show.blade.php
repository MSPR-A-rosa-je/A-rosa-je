@include('layouts/header')
@section('title', 'Chat')

<div class="container">
    <div class="row">
        @include('front.chat.users', ['users'=>$users])
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{$user->first_name}} {{$user->last_name}}</div>
                <div class="card-body chat">
                    <form action="" method="post">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <textarea name="content" placeholder="Ecrivez votre message" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Envoyez</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts/footer')
