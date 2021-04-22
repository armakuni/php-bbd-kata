<?php

namespace Flitter;

class InMemoryFollowRepository implements FollowRepository
{
    /**
     * @var Follow[]
     */
    private array $follows = [];

    public function add(Follow $follow)
    {
        $this->follows[] = $follow;
    }

    /**
     * @return Follow[]
     */
    public function getFollowsByUser(string $user): array
    {
        return array_filter($this->follows, fn($follow) => $follow->getFollower() == $user);
    }
}
