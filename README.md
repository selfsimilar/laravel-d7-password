Laravel Drupal 7 Password
===================

[![Build Status](https://travis-ci.org/selfsimilar/laravel-d7-password.svg?branch=main)](https://travis-ci.org/selfsimilar/laravel-d7-password)

This Laravel 8 package provides an easy way to create and check against Drupal 7
password hashes. Drupal is not required.


Installation
------------

#### Step 1: Composer

Begin by installing this package through Composer. Edit your project's
`composer.json` file to require `selfsimilar/laravel-d7-password`.

```json
"require": {
  "selfsimilar/laravel-d7-password": "~0.1.0"
}
```

Next, update Composer from the Terminal:

```shell
composer update
```

#### Step 2: Register Laravel Service Provider

Once this operation completes, the final step is to
[register the service provider](https://laravel.com/docs/8.x/providers#registering-providers).

* **Laravel 5.x+**: Open `config/app.php`, and add a new item to the providers array
* **Laravel 4.x**: Open `app/config/app.php`, and add a new item to the providers array

```php
'Selfsimilar\D7Password\D7PasswordProvider'
```


Usage
-----

Add a **use statement** for the D7Password facade

```php
use Selfsimilar\D7Password\Facades\D7Password;
```

### `make()` - Create Password Hash

Similar to the Drupal
[`user_hash_password()`](https://api.drupal.org/api/drupal/includes%21password.inc/function/user_hash_password/7.x) function

```php
$hashed_password = D7Password::make('plain-text-password');
```

### `check()` - Check Password Hash

Similar to the Drupal
[`user_check_password()`](https://api.drupal.org/api/drupal/includes%21password.inc/function/user_check_password/7.x) function

```php
$password = 'plain-text-password';
$d7_hashed_password = '$S$B7TRc6vrwCfjgKLZLgmN.dmPo6msZR.';

if ( D7Password::check($password, $d7_hashed_password) ) {
    // Password success!
} else {
    // Password failed :(
}
```

### Dependency Injection

I used a facade above to simplify the documentation. If you'd prefer not to use
the facade, you can inject the following interface: `Selfsimilar\D7Password\Contracts\D7Password`.
