<?php

namespace App\Traits;

use App\Models\Scopes\likesCountScope;
use App\Models\Scopes\PublishedScope;

trait HasPublishAndLikesScope
{
    protected static function bootHasPublishAndLikesScope(): void
    {
        static::addGlobalScope(new PublishedScope);

        static::addGlobalScope(new likesCountScope);
    }

}
