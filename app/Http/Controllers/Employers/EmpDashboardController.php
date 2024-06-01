<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->header('HX-Request')) {
            return view('components.employer.dashboard')->render() . view('components.employer.module-title', ['module_title' => 'Dashboard']);
        } else {
            return view('layouts.employer.dashboard', ['module_title' => 'Dashboard']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
