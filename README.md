# RoleAuth
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE) 
[![Travis](https://img.shields.io/travis/PotatoPowered/RoleAuth.svg?style=flat-square)](https://travis-ci.org/PotatoPowered/RoleAuth)
[![Codecov](https://img.shields.io/codecov/c/github/PotatoPowered/RoleAuth.svg?style=flat-square)](https://codecov.io/github/PotatoPowered/RoleAuth)
[![Packagist](https://img.shields.io/packagist/dt/potatopowered/role-auth.svg?style=flat-square)](https://packagist.org/packages/potatopowered/role-auth)

## Description
The RoleAuth Component aims to make authorization in CakePHP 3.x applications as simple as can be.

## Installation Guide

Add the component to your composer.json you can do this easily using composer itself.
```
composer require potatopowered/role-auth
```
Add the roles table using migrate.
```
bin/cake migrations status -p RoleAuth
```
Load the RoleAuth Component with the other components in the initialize function of your AppController to have it accessible in all controllers.
```
$this->loadComponent('RoleAuth.RoleAuth');
```
### Advanced Load
```
$this->loadComponent('RoleAuth.RoleAuth', [
  'roles_table' => 'roles',
  'admin_role' => 'Admin',
  'default_role' => 'User'
]);
```
## Usage
*This assumes that you have `role_id` setup in the user linking to this plugins roles table.*
### Check if a user is an admin
To use the RoleAuth component to check if a user is an admin you can make a call as such. The following will check the logged in
users `role_id` and verify that they are an admin or not. The result is boolean.
```
$this->RoleAuth->isAdmin($this->Auth->user('role_id'));
```
### Check if a user has a specific role
To use the RoleAuth component to check if a user is a specific role you can make a call as such. The following will check the logged in
users `role_id` and verify that they have a role or not. The result is boolean.
```
$this->RoleAuth->hasRole('YourRole', $this->Auth->user('role_id'));
```
### Set all role variables
To use the RoleAuth component to check the users role and set all role variables in one shot you can make a call as such. The following will check the logged in users `role_id` and verify that they have a role or not. The result is boolean.
```
$this->RoleAuth->setRoles($this->Auth->user());
```
