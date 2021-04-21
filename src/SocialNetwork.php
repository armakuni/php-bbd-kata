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
     */
    public function getFeedFor(string $user): void;

    /**
     * Make one user follow another
     */
    public function follow(string $follower, string $followee): void;
}