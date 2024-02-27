# Townsend Music Laravel Coding Test

## Objective

Your task is to refactor the `GetProductsController` without altering its existing functionality. This controller is used by an API route that provides a list of products to external services. It is vitally important that nothing is changed in the data that it returns. 

The existing route, `/api/products`, returns all products and this functionaly should remain unchanged. 

We would like you to add a new route alongside it, `/api/products/{section}`, which will return all products belonging to the specified section.

## What we're looking for

We are looking to see your understanding and use of the Laravel ecosystem as well as adopting the latest PHP fundamentals and best practices. We want the code to be clearly readable, maintainable, type safe and flexible to grow with future feature requirements.

Things to bear in mind:
- The API will be used by external actors for the state of the query parameters cannot be verified.
- How can we ensure that the functionality has not changed during the refactor?
- Don't do everything yourself, if there's a feature in Laravel or 3rd party package that can do what you want for you, use it.

## Code Style
As a point of reference within the task we would like you to adopt the [Spatie Laravel PHP style guide](https://spatie.be/guidelines/laravel-php) which highlights the standard of code we are looking for.

## Models and Relationships

The models and their relationships have already been established.

## Development Environment

Set up your dev environment using the setup that you are most comfortable with. The project already includes [Laravel Sail](https://github.com/laravel/sail) for your convenience.

## Test Data

Test data is provided through seeders. After running the `php artisan migrate --seed` command, your database should be ready for use.

## Time Constraint

While we understand the time-consuming nature of coding tasks, we kindly request that you limit yourself to a maximum of two hours on this task (not including any time required to setup your environment). Please do not worry if you can't complete the task within the stipulated time. Our primary interest is in assessing your problem-solving approach and your understanding of the Laravel framework and best practices, not necessarily the end product. Any notes about your strategies for tackling this task, or your thoughts on potential improvements to the code, are greatly appreciated.

## Submitting the Test

The easiest way for all involved to review this test is via GitHub. We request that you clone the project or copy to the code to your own **private repository**. Once completed please provide access to [@albanh](https://github.com/albanh), [@alexbirtwell](https://github.com/alexbirtwell) and [@oddvalue](https://github.com/oddvalue). This can be done under Settings > Collaborators.

Any notes on your strategy or improvements should be added to the repository in a NOTES.md or replace the content of this readme.
