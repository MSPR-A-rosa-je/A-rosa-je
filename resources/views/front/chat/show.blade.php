@include('layouts/header')
@section('title', 'Chat')

<div class="container mx-auto">
    <div class="flex flex-wrap -mx-4">
        @include('front.chat.users', ['users'=>$users, 'unread'=> $unread])
        <div class="md:w-9/12 px-4">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="bg-gray-100 p-4 border-b">{{$user->first_name}} {{$user->last_name}}</div>
                <div class="p-4 chat">
                    @if($messages->hasMorePages())
                    <div class="text-center">
                        <a class="bg-white text-gray-700 border border-gray-300 hover:bg-gray-100 hover:text-gray-800 focus:outline-none px-4 py-2 rounded-md" href="{{ $messages->nextPageUrl() }}">
                            Voir les messages précédents
                        </a>
                    </div>
                    @endif
                    @foreach(array_reverse($messages->items()) as $message)
                    <div class="flex flex-wrap -mx-4">
                        <div class="md:w-10/12 {{ $message->from->id !== $user->id ? 'offset-md:w-2/12 text-right': ''}}">
                            <p>
                                <strong>{{ $message->from->id !== $user->id ? 'Moi' : $message->from->first_name }} {{ $message->from->id !== $user->id ? '' : $message->from->last_name }}</strong><br>
                                {!! nl2br(e($message->content)) !!}
                            </p>

                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <br>
                    @if($messages->previousPageUrl())
                    <div class="text-center">
                        <a class="bg-white text-gray-700 border border-gray-300 hover:bg-gray-100 hover:text-gray-800 focus:outline-none px-4 py-2 rounded-md" href="{{ $messages->previousPageUrl() }}">
                            Voir les messages suivants
                        </a>
                    </div>
                    @endif
                    <br>
                    @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-xl" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li><span class="block sm:inline">Il doit y avoir du contenu dans le message.</span></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="" method="post">
                        {{ csrf_field()}}
                        <div class="mb-4">
                            <textarea name="content" placeholder="Ecrivez votre message" class="border p-2 w-full max-w-xl rounded focus:ring" style="resize:none"></textarea>
                        </div>
                        <button class="inline-block px-4 py-2 bg-green-500 text-white" type="submit">Envoyez</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts/footer')
