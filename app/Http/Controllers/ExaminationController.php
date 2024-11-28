<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class ExaminationController extends Controller
{
    //
    public function generatePdf(Request $request)
    {
    // Get the logged-in student
    $student = auth()->user()->student;

    // Get the competency standard ID from the request
    $standardId = $request->input('standard_id');

    // Fetch the student's examinations for the selected competency standard
    $examinations = $student->examinations()
        ->whereHas('competencyElement.competencyStandard', function ($query) use ($standardId) {
            $query->where('id', $standardId);
        })
        ->with(['assessor', 'competencyElement.competencyStandard'])
        ->get();

    // Check if there are examinations
    if ($examinations->isEmpty()) {
        return redirect()->back()->with('error', 'No examinations found for this competency standard.');
    }

    // Initialize variables for competency score calculation
    $totalElements = $examinations->count();
    $competentCount = $examinations->where('status', 1)->count();
    $percentage = $totalElements > 0 ? round(($competentCount / $totalElements) * 100) : 0;

    // Determine competency level based on the percentage
    if ($percentage >= 91) {
        $competencyLevel = 'Sangat Kompeten';
    } elseif ($percentage >= 75) {
        $competencyLevel = 'Kompeten';
    } elseif ($percentage >= 61) {
        $competencyLevel = 'Cukup Kompeten';
    } else {
        $competencyLevel = 'Belum Kompeten';
    }

    // Get the competency standard
    $competencyStandard = $examinations->first()->competencyElement->competencyStandard;

    // Generate PDF
    $pdf = PDF::loadView('certificate', compact('student', 'competencyStandard', 'percentage', 'competencyLevel', 'examinations'));

    // Download the PDF
    return $pdf->download('certificate_' . $standardId . '.pdf');
    }

    public function generatedPdf(Request $request)
    {
    // Get the logged-in student
    $student = auth()->user()->student;

    // Get the competency standard ID from the request
    $standardId = $request->input('standard_id');

    // Fetch the student's examinations for the selected competency standard
    $examinations = $student->examinations()
        ->whereHas('competencyElement.competencyStandard', function ($query) use ($standardId) {
            $query->where('id', $standardId);
        })
        ->with(['assessor', 'competencyElement.competencyStandard'])
        ->get();

    // Check if there are examinations
    if ($examinations->isEmpty()) {
        return redirect()->back()->with('error', 'No examinations found for this competency standard.');
    }

    // Initialize variables for competency score calculation
    $totalElements = $examinations->count();
    $competentCount = $examinations->where('status', 1)->count();
    $percentage = $totalElements > 0 ? round(($competentCount / $totalElements) * 100) : 0;

    // Determine competency level based on the percentage
    if ($percentage >= 91) {
        $competencyLevel = 'Sangat Kompeten';
    } elseif ($percentage >= 75) {
        $competencyLevel = 'Kompeten';
    } elseif ($percentage >= 61) {
        $competencyLevel = 'Cukup Kompeten';
    } else {
        $competencyLevel = 'Belum Kompeten';
    }

    // Get the competency standard
    $competencyStandard = $examinations->first()->competencyElement->competencyStandard;

    // Generate PDF
    $pdf = PDF::loadView('certificate', compact('student', 'competencyStandard', 'percentage', 'competencyLevel', 'examinations'));

    // Download the PDF
    return $pdf->download('certificate_' . $standardId . '.pdf');
    }

}
