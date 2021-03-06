<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var AdminService
     */
    private $adminService;

    /**
     *
     */
    public function __construct()
    {
        $this->adminService = new AdminService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $token = $this->adminService->authenticate($request);

        return response()->json($token);
    }
}
