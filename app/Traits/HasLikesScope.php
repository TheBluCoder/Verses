<?php

namespace App\Traits;

use App\Models\Scopes\likesCountScope;
use App\Models\Scopes\PublishedScope;

trait HasLikesScope
{
    protected static function bootHasLikesScope(): void
    {
        static::addGlobalScope(new likesCountScope);
    }

}
