<?php
namespace App\Traits;

use Illuminate\Validation\Rules\Enum;

/**
 * simple Enum to Array converstion trait
 * Note: Enum trait to iterate an enum. for all other basic usages Enum::cases(); would do the job just fine.
 * @author Daryl Varghese <dv@nomadecom.com>
 */
trait EnumToArray
{

  public static function names(): array
  {
    return array_column(self::cases(), 'name');
  }

  public static function values(): array
  {
    return array_column(self::cases(), 'value');
  }

  public static function array(): array
  {
    return array_combine(self::names(), self::values());
  }

  public static function arrayReverse(): array
  {
    return array_combine(self::values(), self::names());
  }

  public static function valueOf(string|int $enumValue): self|null{
    return self::tryFrom($enumValue) ?? null;
  }

}