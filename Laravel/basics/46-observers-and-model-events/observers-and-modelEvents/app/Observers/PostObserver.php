<?php

namespace App\Observers;

use App\Models\post;

class PostObserver
{
    public function retrieved(post $post){
        $post->increment("likes");
    }
    /**
     * Handle the post "created" event.
     */
    public function created(post $post): void
    {
        //
    }

    /**
     * Handle the post "updated" event.
     */
    public function updated(post $post): void
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     */
    public function deleted(post $post): void
    {
        //
    }

    /**
     * Handle the post "restored" event.
     */
    public function restored(post $post): void
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     */
    public function forceDeleted(post $post): void
    {
        //
    }
}
