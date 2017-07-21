# Passport 
- We installed passport 
- Can generate client\_id and client\_secret
- Figured out how to check for token on routes with 
```
Route::get('/route', 'controller')->middleware('auth:api');

```
- Redirect to a Controller I could declare if authentication succeeds
- In said controller could return data about the user logged in and his or her role.

- Can Return  a Auth _token thru the Auth object
[Authentication](ttps://laravel.com/docs/5.4/authentication)
- Can also generate a Passport Access Token 
[Passport](https://laravel.com/docs/5.4/passport)

- Wondering if we use either passport or auth or both?

### branch I was working on but didnt save all code...
autoText