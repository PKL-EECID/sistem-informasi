<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HeadReport;

class CmReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenance_type = "cm";
        $headReports = HeadReport::where('maintenance_type', $maintenance_type)
        //select eecid expertise only
        ->with(array('experts'=>function ($query) {
            $query->where('expert_company', 'Era Elektra Corpora Indonesia');
        }))
        ->get();
        
        return view('expert.report.index', compact('headReports', 'maintenance_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expert.report.cm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($maintenance_type, $id)
    {
        $headReport = HeadReport::Where('head_id', $id)->first();
        abort_unless($headReport, 404, 'Report not found');

        $cmBodyReport = $headReport->cmBodyReport;
        abort_unless($cmBodyReport, 404, 'Report not found');

        $recommendations = $headReport->recommendations;
        $reportImages = $headReport->reportImages;

        if ($headReport->printedReports) {
            $fileName = explode("/", $headReport->printedReports->file)[1]; // return "namafile.pdf" without "cm/"
        } else {
            $fileName = '';
        }

        return view('expert.report.cm.show', compact('cmBodyReport', 'headReport', 'recommendations', 'reportImages', 'fileName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('expert.report.cm.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HeadReport::destroy($id);
        return redirect()->route('cm.index')->with('status_delete', 'Data Dihapus');
    }
}
