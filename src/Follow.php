<?php

namespace Flitter;

class Follow
{
    private string $follower;
    private string $user;

    public function __construct(string $follower, string $user)
    {
        $this->follower = $follower;
        $this->user = $user;
    }

    public function getFollower(): string
    {
        return $this->follower;
    }

    public function getUser(): string
    {
        return $this->user;
    }
}
