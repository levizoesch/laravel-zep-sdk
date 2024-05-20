# Zep PHP SDK for Laravel
This is an unofficial Zep SDK for Laravel.

This is a WIP, and not yet stable for production. When this readme is updated with setup guide is when its ready...

## Installation

```bash
composer require levizoesch/laravel-zep-sdk
```

Publish configuration file.
```bash
php artisan vendor:publish --tag=zep-sdk-config
```

Set Zep Token

```bash
php artisan env:set ZEP_TOKEN ABC_123-TOKEN
```