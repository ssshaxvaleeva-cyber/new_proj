<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        if ($sort != 'asc' && $sort != 'desc') {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $request->validate([
            'status' => "exists:statuses,id"
        ]);

        if ($status) {
            $reports = Report::where('status_id', $status)
                ->where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(3);
        } else {
            $reports = Report::where('user_id', Auth::user()->id)
                ->orderBy('created_at', $sort)
                ->paginate(3);
        }

        $statuses = Status::all();
        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'number' => 'required|string',
        'description' => 'required|string',
        'path_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('path_img')) {
        $file = $request->file('path_img');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);
        $data['path_img'] = $filename;
    }

    $data['user_id'] = Auth::user()->id;
    $data['status_id'] = 1;

    Report::create($data);

    return redirect()->route('reports.index')->with('success', 'Заявка создана');
}

    public function edit(Report $report)
    {
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $data = $request->validate([
            'number' => 'required|string',
            'description' => 'required|string',
            'path_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('path_img')) {
            $file = $request->file('path_img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['path_img'] = $filename;
        }

        $report->update($data);

        return redirect()->route('reports.index')->with('success', 'Заявка обновлена');
    }

    public function destroy(Report $report)
    {
        if (Auth::user()->id !== $report->user_id) {
            abort(403, 'У вас нет прав на удаление этой записи.');
        }

        $report->delete();

        return redirect()->back()->with('success', 'Заявка удалена');
    }

    public function statusUpdate(Request $request, Report $report)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);
        $report->update($request->only(['status_id']));
        return redirect()->back();
    }
}
