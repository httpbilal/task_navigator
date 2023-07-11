<?php

namespace App\Http\Controllers\StatusControllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return response()->json(['statuses' => $statuses]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $status = Status::create($request->only('name'));

        return response()->json(['status' => $status, 'message' => 'Status created successfully'], 201);
    }

    public function show(Status $status)
    {
        return response()->json(['status' => $status]);
    }

    public function update(Request $request, Status $status)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $status->update($request->only('name'));

        return response()->json(['status' => $status, 'message' => 'Status updated successfully']);
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return response()->json(['message' => 'Status deleted successfully']);
    }
}
