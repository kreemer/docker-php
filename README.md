Docker PHP
==========

**Docker PHP** (for lack of a better name) is a [Docker](http://docker.com/) client written in PHP and heavily inspired 
by the official [docker-php](https://github.com/docker-php/docker-php) Repository.

The reason this isn't a fork is because the separation between the api
class files and the actual client into two repositories lead to 
time-consuming work to sync these two repositories. 

So this repository contains the client as well as the api (basically it's the 
idea behind the repository [Morgonus/docker-api-php-client](https://github.com/Morgonus/docker-api-php-client)). 

This library aim to reach 100% API support of the Docker Engine.

Installation
------------

The recommended way to install Docker PHP is of course to use [Composer](http://getcomposer.org/):

```bash
composer require kreemer/docker-php
```

Docker API Version
------------------

Currently only the latest version of the api is supported.


Usage
-----

See [the documentation](http://docker-php.readthedocs.org/en/latest/) from the original repository.


Unit Tests
----------

Setup the test suite using [Composer](http://getcomposer.org/) if not already done:

```
$ composer install --dev
```

Run it using [PHPUnit](http://phpunit.de/):

```
$ composer test
```

Credits
-------

This README heavily inspired by [willdurand/Negotiation](https://github.com/willdurand/Negotiation) by @willdurand. This guy is pretty awesome.

The code and idea itself is inspired by [docker-php](https://github.com/docker-php/docker-php) by @JoelWurtz. This guy is too pretty awesome.

License
-------

The MIT License (MIT). Please see [License File](LICENSE) for more information.
