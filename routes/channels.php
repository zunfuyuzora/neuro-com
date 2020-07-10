<?php

use Illuminate\Support\Facades\Broadcast;
use App\Group;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('group.{group}', function ($user,Group $group){
    $isMem = $user->getMember->where('group_id',$group->id)->first();
    $isMem = count($isMem) == 1 ? true:false;
    return (bool) $isMem;
});
