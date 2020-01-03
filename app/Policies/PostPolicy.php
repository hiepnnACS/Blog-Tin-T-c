<?php

namespace App\Policies;

use App\Post;
use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 1) {

                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 3) {

                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 4) {

                    return true;
                }
            }
        }
        return false;
    }

    public function publish(Admin $user)
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 9) {

                    return true;
                }
            }
        }
        return false;
    }

    public function categoryCRUD(Admin $user) 
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 8) {

                    return true;
                }
            }
        }
        return false;
    }

    public function userCRUD(Admin $user)
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 10) {

                    return true;
                }
            }
        }
        return false;
    }

    public function permissionCRUD(Admin $user)
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 17) {

                    return true;
                }
            }
        }
        return false;
    }

    public function roleCRUD(Admin $user)
    {
        foreach ($user->roles as $user_role) {

            foreach($user_role->permissions as $permission) {

                if($permission->id == 12) {

                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
