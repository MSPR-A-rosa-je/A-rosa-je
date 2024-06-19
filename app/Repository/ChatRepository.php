<?php
namespace App\Repository;

use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ChatRepository{

    /**
     * @var User
     * @var Message
     */
    private $message;
    private $user;

    public function __construct(User $user, Message $message){
        $this->user = $user;
        $this->message = $message;
    }

    public function getChat(int $userId){
        $chats = $this->user->newQuery()
            ->select('first_name', 'last_name', 'id')
            ->where('id', '!=', $userId)
            ->get();
        return $chats;
    }

    public function createChat(string $content, int $from, int $to){
        return $this->message->newQuery()->create([
            'content' => $content,
            'from_id' => $from,
            'to_id' => $to,
            'created_at' => Carbon::now()
        ]);
    }

    public function getMessagesFor(int $from, int $to): Builder
    {
        return $this->message->newQuery()
            ->whereRaw("((from_id =$from AND to_id = $to) OR (from_id = $to AND to_id = $from))")
            ->orderBy('created_at', 'DESC')
            ->with([
                'from'=>function ($query){
                return $query->select('first_name', 'last_name', 'id');
                }
            ]);
    }

    /**
     * récupère le nombre de messages non-lus pour chaque conversation
     * @param int $userId
     */
    public function unreadCount(int $userId){
        return $this->message->newQuery()
            ->where('to_id', $userId)
            ->groupBy('from_id')
            ->selectRaw('from_id, COUNT(id) as count')
            ->whereRaw('read_at IS NULL')
            ->get()
            ->pluck('count', 'from_id');
    }

    /***
     * Marque tous les messages de cet utilisateur comme lu
     * @param $id
     *
     */
    public function readAllFrom(int $from, int $to)
    {
        $this->message->where('from_id', $from)->where('to_id', $to)->update(['read_at'=> Carbon::now()]);
    }
}
