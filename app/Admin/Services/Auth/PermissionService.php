<?php

namespace App\Admin\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionService
{
    /**
     * Check permission.
     *
     * @param Request $request
     *
     * @return bool
     */
    public static function check(Request $request): bool
    {
        $user = AuthService::user();

        // user permission
        foreach($user->permissions as $item) {

            // all permission
            if($item->permission->http_path == '*') {
                return true;
            }

            if(strcasecmp($item->permission->http_path, $request->path()) == 0) {
                return true;
            }
        }

        // role permission
        foreach($user->roles as $role) {

            foreach($role->permissions as $permission) {

                // all permission
                if($permission->http_path == '*') {
                    return true;
                }

                if(strcasecmp($permission->http_path, $request->path()) == 0) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Send error response page.
     * 
     * @return mixed
     */
    public static function error()
    {
        return new Response(admin_view(config('admin.vendor.view.forbidden')));
    }

    /**
     * If current user is administrator.
     *
     * @return bool
     */
    public static function isAdministrator(): bool
    {
        $user = AuthService::user();

        return $user->roles->pluck('tag')->contains('Administrator');
    }
}
