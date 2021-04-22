<?php

namespace Features\Flitter;

use Behat\Behat\Context\Context;
use Flitter\Flitter;
use Flitter\SocialNetwork;

use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\assertNotContains;

class MainContext implements Context
{
    private SocialNetwork $network;
    private array $feed;

    public function __construct()
    {
        $this->network = new Flitter();
    }

    /**
     * @Given :author has posted a message :message
     */
    public function userHasPostedAMessage(string $author, string $message): void
    {
        $this->network->post($author, $message);
    }

    /**
     * @Given :follower follows :user
     */
    public function userFollows(string $follower, string $user): void
    {
        $this->network->follow($follower, $user);
    }

    /**
     * @Given :follower is not following :user
     */
    public function userIsNotFollowing(string $follower, string $user): void
    {
        // Intentionally blank
    }

    /**
     * @When :user views their feed
     */
    public function userViewsTheirFeed(string $user): void
    {
        $this->feed = $this->network->getFeedFor($user);
    }

    /**
     * @Then they can see the message :message by :author
     */
    public function theyCanSeeTheMessageByAuthor(string $message, string $author): void
    {
        assertContains(["author" => $author, "message" => $message], $this->feed);
    }

    /**
     * @Then they cannot see the message :message by :author
     */
    public function theyCannotSeeTheMessageByAuthor(string $message, string $author): void
    {
        assertNotContains(["author" => $author, "message" => $message], $this->feed);
    }
}
