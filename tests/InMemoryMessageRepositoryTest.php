<?php

namespace Tests\Flitter;

use Flitter\InMemoryMessageRepository;
use Flitter\Message;
use Flitter\MessageRepository;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotContains;

class InMemoryMessageRepositoryTest extends TestCase
{
    private MessageRepository $repository;

    protected function setUp(): void
    {
        $this->repository = new InMemoryMessageRepository();
    }

    public function testGetMessagesByReturnAnEmptyArray()
    {
        assertEquals([], $this->repository->getMessagesBy("Alice"));
    }

    public function testGetMessagesByReturnsMessagesByTheAuthor()
    {
        $message1 = new Message("Alice", "Hi 1");
        $message2 = new Message("Alice", "Hi 2");

        $this->repository->addMessage($message1);
        $this->repository->addMessage($message2);

        assertContains($message1, $this->repository->getMessagesBy("Alice"));
        assertContains($message2, $this->repository->getMessagesBy("Alice"));
    }

    public function testGetMessagesByDoesNotReturnMessagesByOtherAuthors()
    {
        $message = new Message("Bob", "Hi 1");

        $this->repository->addMessage($message);

        assertNotContains($message, $this->repository->getMessagesBy("Alice"));
    }

    public function testGetMessagesMentioningUserDoesNotReturnsMessagesMentioningTheUsers()
    {
        $message = new Message("Alice", "I do not link Bob");

        $this->repository->addMessage($message);

        assertNotContains($message, $this->repository->getMessagesMentioningUser("Bob"));
    }

    public function testGetMessagesMentioningUserReturnsAnMessagesWhichMentionTheUser()
    {
        $message = new Message("Alice", "I like @Bob");

        $this->repository->addMessage($message);

        assertContains($message, $this->repository->getMessagesMentioningUser("Bob"));
    }
}
