<?php

namespace App\Enums;

enum UserRole: string {
    case ADMINISTRATOR = "Administrator";
    case MODERATOR = "Moderator";
    case DEFAULT = "Default";
}