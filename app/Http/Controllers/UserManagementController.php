<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate as GateAuth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserManagementController extends Controller
{
    function index()
    {
        abort_if(GateAuth::denies('admin-action'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('user-management.index');
    }
}
