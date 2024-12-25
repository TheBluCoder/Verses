<?php

namespace App\Traits;

use App\Models\Scopes\LikesCountScope;
use App\Models\Scopes\PostIsLikedScope;

trait HasLikesAndIsLikedScope
{
    protected static function bootHasLikesAndIsLikedScope(): void
    {
        static::addGlobalScope(new LikesCountScope);

    }

}
