<?php

namespace Flitter;

class Message
{
    private string $author;
    private string $message;

    public function __construct(string $author, string $message)
    {
        $this->author = $author;
        $this->message = $message;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function isByAuthor(string $user): bool
    {
        return $this->author == $user;
    }

    public function mentionsUser(string $user): bool
    {
        return str_contains($this->message, "@$user");
    }
}
