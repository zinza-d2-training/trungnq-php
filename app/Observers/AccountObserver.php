<?php

namespace App\Observers;

use Illuminate\Support\Facades\Hash;
use App\Services\UploadImage;
use App\Models\User;

class AccountObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */

    
 /*    public function created(User $user)
    {
        //
    } */

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
  /*   public function deleted(User $user)
    {
        //
    }
 */
    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
   /*  public function restored(User $user)
    {
        //
    } */

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
  /*   public function forceDeleted(User $user)
    {
        //
    } */

    public function saving(User $user){
        /* $user['name'] = $user['name']."testObbb"; */
    }
}
