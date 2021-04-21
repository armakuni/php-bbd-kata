# Outside-In TDD/BDD Kata (Social Network) - PHP Version

This is a repository contains the starting point for running the outside-in TDD/BDD kata.

The goal of this exercise is to show how to use human-readable specifications to drive the
development of a system from the outside.

## How To Do The Kata

Implement each of the commented out features in [message_feed.feature](./features/message_feed.feature).
The code in the [MainContext.php](./features/bootstrap/MainContext.php) should only interact
with an instance of [SocialNetwork](./src/SocialNetwork.php).

## Development Setup

You will need to have PHP and [Composer](https://getcomposer.org/) installed on you
composer to run this kata.

### Install the Dependencies

```shell
composer install
```

### Run Tests

```shell
composer run test
```

#### Run Linting Checks

```shell
composer run lint
```

#### Running Unit Tests

```shell
composer run test:unit
```

#### Running End-to-End Tests

```shell
composer run test:e2e
```