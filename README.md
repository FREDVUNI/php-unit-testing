# Task Manager Test - PHP UNIT testing with phpunit

This is a simple task manager application built using PHP and MySQL.

## Setup

1. Clone the repository to your local machine.
2. Create a new database in MySQL and import the `todo_tasks_test.sql` file to create the required tables.
3. Edit the `database.php` file to provide the correct database credentials.
4. Run `composer install` to install the required dependencies.

## Usage

To run the application, start a local server and run the various test suites.

## Testing

To run the PHPUnit tests, run the following command from the root of the project:

```
vendor/bin/phpunit
```

This will run all the tests in the `tests/` directory. You can run specific test files:

```
vendor/bin/phpunit CreateTasksTest
```

This will only run the `CreateTasksTest` class.

```
vendor/bin/phpunit DeleteTasksTest
```

This will only run the `DeleteTasksTest` class.

```
vendor/bin/phpunit FetchTasksTest
```

This will only run the `FetchTasksTest` class.

```
vendor/bin/phpunit UpdateTasksTest
```

This will only run the `UpadateTasksTest` class.
