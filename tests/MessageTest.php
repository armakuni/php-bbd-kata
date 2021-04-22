<?php

namespace Tests\Flitter;

use Flitter\Message;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class MessageTest extends TestCase
{
    private Message $aliceMessage;
    private Message $bobMessage;

    protected function setUp(): void
    {
        $this->aliceMessage = new Message("Alice", "Hey!");
        $this->bobMessage = new Message("Bob", "Hey!");
    }

    public function testIsByAuthorReturnsTrueWhenTheAuthorMatches()
    {
        assertTrue($this->aliceMessage->isByAuthor("Alice"));
        assertTrue($this->bobMessage->isByAuthor("Bob"));
    }

    public function testIsByAuthorReturnsFalseWhenTheAuthorDoesNotMatch()
    {
        assertFalse($this->aliceMessage->isByAuthor("Bob"));
        assertFalse($this->bobMessage->isByAuthor("Alice"));
    }

    public function testMentionsUsersReturnsFalseWhenTheUserIsMentioned()
    {
        $message = new Message("Bob", "I'm not mentioning anyone");
        assertFalse($message->mentionsUser("Alice"));
    }

    public function testMentionsUsersReturnsTrueWhenTheUserIsMentioned()
    {
        $message = new Message("Bob", "Hi @Alice");
        assertTrue($message->mentionsUser("Alice"));
    }
}
