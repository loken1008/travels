<?php

namespace App\Policies;

use \App\Models\Tour;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        //return true if user has super power
    }

    /**
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the Tour.
     *
     * @param  User $user
     * @param  Tour $tour
     * @return mixed
     */
    public function view(User $user, Tour $tour)
    {
        return true;
    }

    /**
     * Determine whether the user can create Tour.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Tour.
     *
     * @param User $user
     * @param  Tour $tour
     * @return mixed
     */
    public function update(User $user, Tour $tour)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the Tour.
     *
     * @param User $user
     * @param  Tour $tour
     * @return mixed
     */
    public function delete(User $user, Tour $tour)
    {
        return true;
    }

}