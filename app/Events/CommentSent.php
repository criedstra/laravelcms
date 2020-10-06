<?php
namespace App\Events;

use App\Comment;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class CommentSent
 * @package App\Events
 */
class CommentSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var Comment
     */
    public $comment;

    /**
     * CommentSent constructor.
     * @param User $user
     * @param Comment $comment
     */
    public function __construct(User $user, Comment $comment)
    {
        $this->user = $user;

        $this->comment = $comment;
    }

    /**
     * @return Channel|Channel[]|PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('comment');
    }
}
