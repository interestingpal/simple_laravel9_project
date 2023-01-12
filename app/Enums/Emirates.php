<?php

namespace App\Enums;
use App\Traits\EnumToArray;
/**
 * uae emirates.
 */
enum Emirates:string{
    use EnumToArray;

    case ABU_DHABI = 'ABU DHABI';
    case DUBAI = 'DUBAI';
    case SHARJAH = 'SHARJAH';
    case AJMAN = 'AJMAN';
    case UMM_AL_QUWAIN = 'UMM AL QUWAIN';
    case RAS_AL_KHAIMA = 'RAS AL KHAIMA';
    case FUJAIRAH = 'FUJAIRAH';
    
}