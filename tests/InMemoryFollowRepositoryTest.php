<?php

namespace Tests\Flitter;

use Flitter\Follow;
use Flitter\FollowRepository;
use Flitter\InMemoryFollowRepository;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertContains;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotContains;

class InMemoryFollowRepositoryTest extends TestCase
{
    private FollowRepository $follows;
    private Follow $aliceFollowsBob;
    private Follow $bobFollowsAlice;

    protected function setUp(): void
    {
        $this->aliceFollowsBob = new Follow("Alice", "Bob");
        $this->bobFollowsAlice = new Follow("Bob", "Alice");

        $this->follows = new InMemoryFollowRepository();
        $this->follows->add($this->aliceFollowsBob);
        $this->follows->add($this->bobFollowsAlice);
    }

    public function testGetFollowsByUserReturnsEmptyListWhenThereAreNoFollows()
    {
        assertEquals([], $this->follows->getFollowsByUser("Charlie"));
    }

    public function testGetFollowsByUserReturnsTheFollowsForTheUser()
    {
        assertContains($this->aliceFollowsBob, $this->follows->getFollowsByUser("Alice"));
        assertContains($this->bobFollowsAlice, $this->follows->getFollowsByUser("Bob"));
    }

    public function testGetFollowsByUserDoesNotReturnFollowsForOtherUsers()
    {
        assertNotContains($this->aliceFollowsBob, $this->follows->getFollowsByUser("Bob"));
        assertNotContains($this->bobFollowsAlice, $this->follows->getFollowsByUser("Alice"));
    }
}
