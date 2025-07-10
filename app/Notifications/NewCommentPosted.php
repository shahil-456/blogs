<?php

namespace App\Notifications;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentPosted extends Notification
{

    /**
     * Create a new notification instance.
     */
    public function __construct(public $comment) {}

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Comment on Your Post')
            ->line(auth()->user()->name . ' added a comment on your post:')
            ->line($this->comment->comment)
            ->action('View Comment', url('/posts/' . $this->comment->post_id));
    }

}