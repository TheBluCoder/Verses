<?php

namespace App\Http\Controllers\api\Permissions\v1;

use App\Models\User;

class Abilities{

    public const CREATEPOST = "post:create";
    public const UPDATEPOST = "post:update";
    public const DELETEPOST = "post:delete";
    public const DELETEOWNPOST = "post:own:delete";
    public const DELETEALLPOST = "post:all:delete";
    public const UPDATEALLPOST = "post:all:update";
    public const UPDATEOWNPOST = "post:own:update";
    public const VIEWOWNBOOKMARKS = "bookmarks:view";
    public const VIEWOWNDRAFTS = "drafts:view";
    public const UPDATEOWNDRAFTS = "drafts:update";
    public const CREATEDRAFTS = "drafts:create";
    public static function getAbilities(User $user){
        if($user->isAdmin()){
            return [
                self::DELETEOWNPOST,
                self::DELETEALLPOST,
                self::VIEWOWNBOOKMARKS,
                self::VIEWOWNDRAFTS,
                self::UPDATEOWNDRAFTS,
                self::CREATEPOST,
                self::UPDATEPOST,
                self::UPDATEALLPOST
            ];
        }
        else{
            return [
                self::CREATEPOST,
                self::UPDATEPOST,
                self::DELETEOWNPOST,
                self::VIEWOWNBOOKMARKS,
                self::VIEWOWNDRAFTS,
                self::CREATEDRAFTS,
            ];
        }
    }
}
