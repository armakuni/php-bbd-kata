<?php

namespace Flitter;

interface FollowRepository
{
    public function add(Follow $follow);

    public function getFollowsByUser(string $user);
}
