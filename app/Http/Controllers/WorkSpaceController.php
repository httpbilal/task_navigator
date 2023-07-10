<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WorkSpace;
use Illuminate\Http\Request;

class WorkSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $workSpaces = WorkSpace::all();
        return response()->json(['workspaces' => $workSpaces]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'owner' => 'required',
        ]);

        $workSpace = WorkSpace::create($request->all());

        return response()->json(['workspace' => $workSpace, 'message' => 'Workspace created successfully.'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkSpace  $workSpace
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(WorkSpace $workSpace)
    {
        return response()->json(['data' => $workSpace]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkSpace  $workSpace
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, WorkSpace $workSpace)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'owner' => 'required',
        ]);

        $workSpace->update($request->all());

        return response()->json(['workspace' => $workSpace, 'message' => 'Workspace updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkSpace  $workSpace
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(WorkSpace $workSpace)
    {
        $workSpace->delete();

        return response()->json(['message' => 'Workspace deleted successfully.']);
    }
}
