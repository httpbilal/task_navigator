<?php

namespace App\Http\Controllers\WorkSpaceControllers;

use App\Http\Controllers\Controller;
use App\Models\WorkSpace;
use Illuminate\Http\Request;

class WorkSpaceController extends Controller
{
    public function index()
    {
        $workspaces = WorkSpace::all();
        return response()->json(['workspaces' => $workspaces]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'owner' => 'required',
        ]);

        $workspace = WorkSpace::create($validatedData);

        return response()->json(['workspace' => $workspace, 'message' => 'Workspace created successfully.'], 201);
    }

    public function show(WorkSpace $workspace)
    {
        return response()->json(['data' => $workspace]);
    }

    public function update(Request $request, WorkSpace $workspace)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
            'owner' => 'required',
        ]);

        $workspace->update($validatedData);

        return response()->json(['workspace' => $workspace, 'message' => 'Workspace updated successfully.']);
    }

    public function destroy(WorkSpace $workspace)
    {
        $workspace->delete();

        return response()->json(['message' => 'Workspace deleted successfully.']);
    }
}
