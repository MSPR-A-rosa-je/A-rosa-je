<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageReceived;
use App\Repository\ChatRepository;
use Composer\Factory;
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
        $this->middleware('auth');
        $this->r= $chatRepository;
        $this->auth = $auth;

    }

    public function index(){
        return view('front/chat/index', [
            'users'=> $this->r->getChat($this->auth->user()->id),
            'unread' => $this ->r->unreadCount($this->auth->user()->id)
        ]);
    }

    public function show(User $user){
        $me = $this->auth->user();
        $messages = $this->r->getMessagesFor($me->id, $user->id)->paginate(25);
        $unread = $this ->r->unreadCount($me->id);
        if(isset($unread[$user->id])){
            $this->r->readAllFrom($user->id, $me->id);
            unset($unread[$user->id]);
        }
        return view('front/chat/show', [
            'users'=> $this->r->getChat($this->auth->user()->id),
            'user'=> $user,
            'messages' => $messages,
            'unread' => $unread
        ]);
    }

    public function store(User $user, StoreMessageRequest $request){
        $message = $this->r->createChat(
            $request->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        $user->notify(new MessageReceived($message));
        return redirect(route('chat.show', ['user'=>$user->id]));
    }
}
