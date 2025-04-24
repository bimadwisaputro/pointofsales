<?php

namespace App\Helpers;

class RoleHelper
{
  public static function currentRole()
  {
    return session('session_roles');
  }

  public static function is($role)
  {
    return self::currentRole() === $role;
  }

  public static function isAny(array $roles)
  {
    return in_array(self::currentRole(), $roles);
  }
}
