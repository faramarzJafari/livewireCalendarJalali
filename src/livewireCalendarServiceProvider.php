<?php
namespace fara\livewirecalendarjalali;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use fara\livewirecalendarjalali\Sidebar;
use fara\livewirecalendarjalali\Searchs;
use fara\livewirecalendarjalali\class\infodate\infodate;
class livewireCalendarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component('calendarAdmin', CalendarAdmin::class);
        Livewire::component('calendarUser', CalendarUser::class);
        Livewire::component('addEvent', AddEvent::class);
        Livewire::component('sidebar', Sidebar::class);
        Livewire::component('search', Search::class);
        
        $this->app->bind('infodate',function(){return new infodate;});
        
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');      
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views','fara');
        
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views'),       
            __DIR__.'/../public' => resource_path('css'),       
        ]);    
      
        
    }
}
