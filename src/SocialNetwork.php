<?php


namespace Flitter;


interface SocialNetwork
{
    /**
     * Post a message.
     */
    public function post(string $author, string $message): void;

    /**
     * Get messages in a users feed.
     *
     * @return array['author' => string, 'message' => string]
     */
    public function getFeedFor(string $user): array;

    /**
     * Make one user follow another
     */
    public function follow(string $follower, string $followee): void;
}