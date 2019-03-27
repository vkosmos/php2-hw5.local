<?php

namespace App;

abstract class ControllerAdmin extends Controller
{
    protected function access()
    {
        /*
         * Реализация метода access будет в общем случае отличаться для контроллеров админ-панели,
         * что определяет целесообразность выделения отдельного базового контроллера
         * return User->isAdmin();
         */

        return true;
    }

}