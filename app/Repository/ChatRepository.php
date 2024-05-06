<?php
namespace App\Repository;

use App\Models\User;
use App\Models\Message;
use Carbon\Carbon;

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
        return $this->user->newQuery()
            ->select('first_name', 'last_name', 'id')
            ->where('id', '!=', $userId)
            ->get();
    }

    public function createChat(string $content, int $from, int $to){
        return $this->message->newQuery()->create([
            'content' => $content,
            'from_id' => $from,
            'to_id' => $to,
            'created_at' => Carbon::now()
        ]);
    }
}
