<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\User;
use App\Repository\ChatRepository;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * @var ChatRepository
     * @param AuthManager $auth
     */

    private $r;


    public function __construct(ChatRepository $chatRepository, AuthManager $auth){

        $this->r= $chatRepository;
        $this->auth = $auth;

    }

    public function index(){
        return view('front/chat/index', [
            'users'=> $this->r->getChat($this->auth->user()->id)
        ]);
    }

    public function show(User $user){
        return view('front/chat/show', [
            'users'=> $this->r->getChat($this->auth->user()->id),
            'user'=> $user,
            'messages' => $this->r->getMessagesFor($this->auth->user()->id, $user->id)->paginate(25)
        ]);
    }

    public function store(User $user, StoreMessageRequest $request){
        $this->r->createChat(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        return redirect(route('chat.show', ['user'=>$user->id]));
    }
}
