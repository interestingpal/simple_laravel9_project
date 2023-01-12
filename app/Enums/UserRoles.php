<?php

namespace App\Enums;
use App\Traits\EnumToArray;

/**
 * User Role enum class to add basic ACL implementation via guards.
 */

enum UserRoles: string{
    use EnumToArray;

    case ADMIN = 'admin';
    case EMPLOYER = 'employer';
}