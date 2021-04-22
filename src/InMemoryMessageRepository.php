<?php

namespace Flitter;

class InMemoryMessageRepository implements MessageRepository
{
    /**
     * @var Message[]
     */
    private array $messages = [];

    public function addMessage(Message $message): void
    {
        $this->messages[] = $message;
    }

    /**
     * @return Message[]
     */
    public function getMessagesBy(string $user): array
    {
        return array_filter($this->messages, fn($message) => $message->isByAuthor($user));
    }

    /**
     * @return Message[]
     */
    public function getMessagesMentioningUser(string $user): array
    {
        return array_filter($this->messages, fn($message) =>$message->mentionsUser($user));
    }
}
