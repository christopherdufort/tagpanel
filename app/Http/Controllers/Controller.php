<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


//class Controller extends BaseController
//{
//    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
//    //DispatchesCommands deprecated?
//
//}
abstract class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct(Guard $guard)
    {
        $this->user = $guard->user();
    }
}
