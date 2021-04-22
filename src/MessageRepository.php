<?php

namespace Flitter;

interface MessageRepository
{
    public function addMessage(Message $message): void;

    /**
     * @return Message[]
     */
    public function getMessagesBy(string $user): array;
}
