# Laravel Passport (API Auth) Notes

## Getting Started

Passport is a built-in Laravel feature, built to use Oauth2, which allows a simpler way of doing API authentication. In our project, we essentially have two different halves which make up the total application. The front-end of the project is being built using AngularJS and the back-end is being built using Laravel. Our main goal with using Passport was/is to add authentication for when the front-end of our app contacts the API which was built within our back-end.

To learn about and setup using Passport, we essentially followed both the documentation and a video tutorial from Laracasts. These can be viewed here:

Documentation: https://laravel.com/docs/5.4/passport
Laracasts video: https://laracasts.com/series/whats-new-in-laravel-5-3/episodes/13

## Using Within Our Project

Following the steps laid out from these resources, our home.blade.php was converted into a Oauth client creator of sort. This allowed us to manually add clients, creating a client ID and secret key in the process.

After obtaining these two items, a client (in this case our front-end app built in AngularJS) can write a function contacting our oauth/token route (note: Passport creates several different routes used in various authentication steps which all start with “oauth”) which is a part of our Laravel back-end. When contact is made, the client ID and secret key are passed to our Laravel app where Passport verifies the information. If the provided id and key are approved by the system, then a token is returned to the client, granting access to view the contents of the API endpoints which exist.

The tokens which are created are by default not set to expire, but that can be changed by using the either the tokensExpireIn or  refreshTokensExpireIn method.