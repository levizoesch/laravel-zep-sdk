# Zep PHP SDK for Laravel
This is an unofficial Zep SDK for Laravel.

This was written around https://help.getzep.com/api-reference and is not an official SDK.

# Last Updated 05/2024

 
> **NOTE**: This is a WIP, and not yet stable for production.

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

---
# Examples

## User

Examples to handle user.

```php
$zepClient = new ZepClient('YOUR_ZEP_TOKEN');
```
Create a Laravel Controller, and begin your crud actions.


    // Create a new user
    $newUser = $zepClient->createNewUser([
        'email' => 'fake@email.com',
        'first_name' => 'Levi',
        'last_name' => 'Zoesch',
        'metadata' => null,
        'user_id' => Str::uuid()
    ]);
    //dd('create',$result);

    // Find the user by ID.
    $findResult = $zepClient->getByUserId($newUser->user_id);
    //dd('find',$find);

    // Update the user.
    $updateResult = $zepClient->updateByUserId($findResult->user_id, [
        'first_name' => 'LEVI',
        'last_name' => 'UPDATED',
        'metadata' => null,
        'user_id' => $findResult->user_id
    ]);
    //dd('updated',$updateResult);

    $listUserSessions = $zepClient->getSessionsByUserId($updateResult->user_id);
    //dd('User Sessions:', $listUserSessions);

    // Destroy the user now, since weve stepped through everything.
    $destroyedResult = $zepClient->destroyByUserId($findResult->user_id);
    dd('Destroyed User:', $destroyedResult);

## Messages
