# Polar Open Accesslink for OAuth 2.0 Client

[![Latest Version](https://img.shields.io/github/release/runalyze/oauth2-polar-open-accesslink.svg?style=flat)](https://github.com/runalyze/oauth2-polar-open-accesslink/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/runalyze/oauth2-polar-open-accesslink/master.svg?style=flat-square)](https://travis-ci.org/runalyze/oauth2-polar-open-accesslink)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/runalyze/oauth2-polar-open-accesslink.svg?style=flat-square)](https://scrutinizer-ci.com/g/runalyze/oauth2-polar-open-accesslink/?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/runalyze/oauth2-polar-open-accesslink.svg?style=flat-square)](https://scrutinizer-ci.com/g/runalyze/oauth2-polar-open-accesslink/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/runalyze/oauth2-polar-open-accesslink.svg?style=flat-square)](https://packagist.org/packages/runalyze/oauth2-polar-open-accesslink)

    This package provides Polar Open Accesslink OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

## Install

Via Composer

``` bash
$ composer require runalyze/oauth2-polar-open-accesslink dev-master
```

## Usage

Usage is the same as The League's OAuth client, using `\League\OAuth2\Client\Provider\PolarOpenAccesslink` as the provider.

``` php
$provider = new League\OAuth2\Client\Provider\PolarOpenAccesslink([
    'clientId'     => '{polar-open-accesslink-id}',
    'clientSecret' => '{polar-open-accesslink-secret}',
    'redirectUri'  => 'https://example.com/callback-url',
]);

if (!isset($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: '.$authUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

    unset($_SESSION['oauth2state']);
    exit('Invalid state');

} else {

    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code']
    ]);

    // Optional: Now you have a token you can look up a users profile data
    try {

        // We got an access token, let's now get the user's details
        //$user = $provider->getResourceOwner($token);

        // Use these details to create a new profile
        //printf('Hello %s!', $user->getFirstName() . ' ' . $user->getLastName());

    } catch (Exception $e) {

        // Failed to get user details
        exit('Oh dear...');

    }

    // Use this to interact with an API on the users behalf
    echo $token->getToken();
}
```

## Testing

``` bash
$ ./vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Michael Pohl](https://github.com/mipapo)
- [All Contributors](https://github.com/runalyze/oauth2-polar-open-accesslink/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
