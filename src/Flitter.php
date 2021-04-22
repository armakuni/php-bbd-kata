<?php

namespace Flitter;

class Flitter implements SocialNetwork
{
    private MessageRepository $messages;
    private FollowRepository $follows;

    /**
     * Flitter constructor.
     */
    public function __construct()
    {
        $this->messages = new InMemoryMessageRepository();
        $this->follows = new InMemoryFollowRepository();
    }

    public function post(string $author, string $message): void
    {
        $this->messages->addMessage(new Message($author, $message));
    }

    public function getFeedFor(string $user): array
    {
        $messages = $this->messages->getMessagesBy($user);

        foreach ($this->follows->getFollowsByUser($user) as $follow) {
            $messages += $this->messages->getMessagesBy($follow->getUser());
        }

        $messages += $this->messages->getMessagesMentioningUser($user);

        return $this->formattedMessages($messages);
    }

    public function follow(string $follower, string $user): void
    {
        $this->follows->add(new Follow($follower, $user));
    }

    private function formattedMessages(array $messages): array
    {
        $formatMessage = fn($message) => ["author" => $message->getAuthor(), "message" => $message->getMessage()];

        return array_map($formatMessage, $messages);
    }
}
