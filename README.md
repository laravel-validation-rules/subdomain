# Subdomain

Validates a user submitted subdomain in your application.

<p align="center">
  <a href="https://travis-ci.org/laravel-validation-rules/subdomain">
    <img src="https://img.shields.io/travis/laravel-validation-rules/subdomain.svg?style=flat-square">
  </a>
  <a href="https://scrutinizer-ci.com/g/laravel-validation-rules/subdomain/code-structure/master/code-coverage">
    <img src="https://img.shields.io/scrutinizer/coverage/g/laravel-validation-rules/subdomain.svg?style=flat-square">
  </a>
  <a href="https://scrutinizer-ci.com/g/laravel-validation-rules/subdomain">
    <img src="https://img.shields.io/scrutinizer/g/laravel-validation-rules/subdomain.svg?style=flat-square">
  </a>
  <a href="https://github.com/laravel-validation-rules/subdomain/blob/master/LICENSE">
    <img src="https://img.shields.io/github/license/laravel-validation-rules/subdomain.svg?style=flat-square">
  </a>
</p>

Supports Laravel: 5.5, 5.6, 5.7 & 5.8

## Installation

```bash
composer require laravel-validation-rules/subdomain
```

## Usage

```php
use LVR\Subdomain\Subdomain;

$request->validate([
    'domain' => ['required', new Subdomain],
]);
```
