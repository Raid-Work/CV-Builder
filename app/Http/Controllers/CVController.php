<?php

namespace App\Http\Controllers;
use App\Models\CV;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class CVController extends Controller
{
    public function create()
    {
        return view('cv.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'summary' => 'required|string',
            'experience' => 'required|string',
            'education' => 'required|string',
        ]);

        $cv = CV::create($data);

        return redirect()->route('cv.download', $cv);
    }


    public function download(CV $cv)
    {
        if($cv->name!="")
        {
        $templateProcessor = new TemplateProcessor(storage_path('app/templates/cv-template.docx'));

        $templateProcessor->setValue('name', $cv->name);
        $templateProcessor->setValue('email', $cv->email);
        $templateProcessor->setValue('summary', $cv->summary);
        $templateProcessor->setValue('experience', $cv->experience);
        $templateProcessor->setValue('education', $cv->education);

        $fileName = 'cv_' . $cv->id . '.docx';
        $templateProcessor->saveAs(storage_path("app/public/{$fileName}"));

        return response()->download(storage_path("app/public/{$fileName}"));
        }
        else{
            return redirect()->route('cv.create',['message'=>'does not exist']);
        }
    }
}

