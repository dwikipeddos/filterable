<?php

namespace dwikipeddos\filterable;

use Illuminate\Database\Eloquent\Builder;

trait Filterable {
    public function scopeFilter(Builder $query,FilterBase $filter): Builder
    {
        return $filter->apply($query);
    }
}