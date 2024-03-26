<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return (new MailMessage)
                ->subject("Verificar cuenta")
                ->line("Tu cuenta ya está casi lista, solo debes confirmar tu cuenta a continuación")
                ->action("Confirmar cuenta", $url)
                ->line("Si tu no has creado esta cuenta, puedes ignorar este mensaje");
        });
    }
}