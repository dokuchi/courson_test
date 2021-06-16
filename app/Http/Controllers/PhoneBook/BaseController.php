<?php

namespace App\Http\Controllers\PhoneBook;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
