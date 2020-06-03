<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Member;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        view()->composer('*', function ($view) 
        {
            if(Auth::check()){
                $groups = $this->getGroup(Auth::user()->id);
                view()->share(['groups' => $groups]);
            }
        });  
    }

    
    private function getGroup($id){
        $membership = Member::where('user_id', $id)->get();
        if($membership->count() < 1){
            return 0;
        }
        return $membership;
    }
}
