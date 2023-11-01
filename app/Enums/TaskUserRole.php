<?php

namespace App\Enums;

enum TaskUserRole: string {
    case OWNER = "Owner";
    case PARTICIPANT = "Participant";
}