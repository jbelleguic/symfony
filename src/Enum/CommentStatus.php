<?php

namespace App\Enum;

enum CommentStatus: string
{
    case Pending = 'Pending';
    case Published = 'Published';
    case Moderated = 'Moderated';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Published => 'Published',
            self::Moderated => 'Moderated',
        };
    }
}