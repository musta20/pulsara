<?php

declare(strict_types=1);

namespace App\Enums\Stage;


enum Stage: string
{

    case Submitted = 'submitted';
    case Reviewing = 'reviewing';
    case Approved = 'approved';
    case Rejected = 'rejected';
}
