<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpPostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->header('HX-Request')) {
            return view('components.employer.jobs')->render() . view('components.employer.module-title', ['module_title' => 'Jobs']);
        } else {
            return view('layouts.employer.job', ['module_title' => 'Jobs']);
        }
    }

    public function getAdd(Request $request){

        $data = [];
        $data['module_title'] = 'Add Jobs';

        
        if ($request->header('HX-Request')) {
            return view('components.employer.jobs-view', $data)->render() . view('components.employer.module-title', $data);
        } else {
            return view('layouts.employer.jobs-add', $data);
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
