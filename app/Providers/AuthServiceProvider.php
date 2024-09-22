<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
            ->subject(Lang::get('VERIFICACIÓN DE CUENTA'))
            ->line(Lang::get('Para verificar su cuenta, porfavor haga click en el boton'))
            ->action(Lang::get('Verificar cuenta'), $url)
            ->line(Lang::get('Si no creó una cuenta, no se requiere ninguna otra acción'))
            ->salutation('Muchas Gracias');
        });
    }
}
