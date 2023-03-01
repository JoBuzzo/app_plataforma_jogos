<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
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
    public function boot()
{
    Validator::extend('nullable_image', function ($attribute, $value, $parameters, $validator) {
        if (!$value) {
            // Se o campo estiver vazio, retorna true para indicar que a validação passou
            return true;
        }

        // Se o campo não estiver vazio, valida se é uma imagem usando a regra "image"
        return Validator::make([$attribute => $value], [$attribute => 'image'])->passes();
    });
}
}
