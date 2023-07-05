<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('users');
    }

    /**
     * @throws Exception|\Exception
     */
    public function getUsers(): \Illuminate\Http\JsonResponse
    {
        $users = User::select(['id', 'name', 'email', 'created_at']);

        return DataTables::of($users)->make(true);
    }

}
