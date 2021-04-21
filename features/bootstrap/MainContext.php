<?php

namespace Features\Flitter;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;

class MainContext implements Context
{
    public function __construct()
    {
    }

    /**
     * @Given :author has posted a message :message
     */
    public function userHasPostedAMessage(string $author, string $message): void
    {
        throw new PendingException();
    }

    /**
     * @Given :follower follows :user
     */
    public function userFollows(string $follower, string $user): void
    {
        throw new PendingException();
    }

    /**
     * @Given :follower is not following :user
     */
    public function userIsNotFollowing(string $follower, string $user): void
    {
        throw new PendingException();
    }

    /**
     * @When :user views their feed
     */
    public function userViewsTheirFeed(string $user): void
    {
        throw new PendingException();
    }

    /**
     * @Then they can see the message :message by :author
     */
    public function theyCanSeeTheMessageByAuthor(string $message, string $author): void
    {
        throw new PendingException();
    }

    /**
     * @Then they cannot see the message :message by :author
     */
    public function theyCannotSeeTheMessageByAuthor(string $message, string $author): void
    {
        throw new PendingException();
    }
}
