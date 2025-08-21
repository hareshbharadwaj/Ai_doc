<?php

namespace App\Http\Controllers;
use Spatie\Browsershot\Browsershot;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    public function index()
    {
        $templates = [
            ['id' => 'interntemp', 'name' => 'Internship Offer letter', 'desc' => 'Generate an internship Offer Letter'],
            // ['id' => 'offer-letter', 'name' => 'Offer Letter', 'desc' => 'Generate a company offer letter'],
            // ['id' => 'experience', 'name' => 'Experience Certificate', 'desc' => 'Generate an employee experience certificate'],
        ];

        return view('documents.index', compact('templates'));
    }
    public function i_temp()
    {
        $templates = [
            [
                'id' => 'internship1',
                'name' => 'template 1',
                'desc' => 'Generate an internship completion certificate',
                'image' => asset('images\temp\internship1.png'),
            ],
        ];

        return view('documents.interntemp', compact('templates'));
    }

    public function showTemplate($template)
    {
        return view("documents.templates.$template");
    }

   public function showForm($template, Request $request)
    {
        if ($request->query('edit') === 'true') {
            // Coming from preview → use last entered formData from session
            $formData = $request->session()->get('currentFormData', [
                'name' => 'John Doe',
                'role' => 'Software Developer Intern',
                'company' => 'Your Company',
                'start_date' => '',
                'end_date' => '',
                'issue_date' => ''
            ]);
        } else {
            // Coming directly from template → always default values
            $formData = [
                'name' => 'John Doe',
                'role' => 'Software Developer Intern',
                'company' => 'Your Company',
                'start_date' => '',
                'end_date' => '',
                'issue_date' => ''
            ];
        }

        return view("documents.forms.$template", compact('formData'));
    }



    public function previewDocument(Request $request, $template)
    {
         $formData = $request->all();
        $request->session()->put('currentFormData', $formData);
        return view("documents.preview.$template", compact('formData'));
    }
    


    public function downloadPDF($template, Request $request)
        {
            $formData = $request->session()->get('currentFormData', [
                'name'       => 'John Doe',
                'role'       => 'Software Developer Intern',
                'company'    => 'Your Company',
                'start_date' => '',
                'end_date'   => '',
                'issue_date' => ''
            ]);

            $html = view("documents.preview.$template", array_merge(
                compact('formData'),
                ['pdfMode' => true]
            ))->render();

            $fileName = "{$template}_certificate.pdf";
            $tempFile = tempnam(sys_get_temp_dir(), 'pdf_') . '.pdf';

            Browsershot::html($html)
                ->showBackground()
                ->paperSize(210, 297) // A4 in mm (width, height)
                ->margins(0, 0, 0, 0)
                ->save($tempFile);

            return response()->download($tempFile, "{$template}_certificate.pdf")->deleteFileAfterSend(true);
        }


}
