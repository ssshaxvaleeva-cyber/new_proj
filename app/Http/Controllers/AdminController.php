<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'desc');
        $statusId = $request->input('status');
    
        $query = Report::with(['user', 'status']); 
    
        if ($statusId) {
            $query->where('status_id', $statusId);
        }
    
        $reports = $query->orderBy('created_at', $sort)->paginate(10);
        $statuses = Status::all();
    
        return view('admin.index', compact('reports', 'statuses'));
    }
}
