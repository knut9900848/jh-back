<?php

namespace App\Http\Controllers\ApiV1\Admin\Setting;

use App\Models\ApiV1\Admin\Setting\TermsAndConditions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $termsAndConditionses = TermsAndConditions::orderBy('id', 'desc')->get();

        return response()->json([
            'termsAndConditionses' => $termsAndConditionses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate( [
            'file' => 'required|file|mimes:pdf|max:5120',
            'name' => 'required|max:255',
            'is_active' => 'required',
            'description' => 'max:255'
        ]);

        $is_active = $request->is_active == "true" ? true : false;

        $attachedFile = $request->file('file');
        $originFileNameWithExtension = $attachedFile->getClientOriginalName();
        $originFileName = pathinfo($originFileNameWithExtension, PATHINFO_FILENAME);
        $extension = $attachedFile->getClientOriginalExtension();
        $mimeType = $attachedFile->getClientMimeType();

        $filename = pathinfo($attachedFile->hashName(), PATHINFO_FILENAME);

        Storage::disk('terms_and_conditions')->putFileAs('/', $attachedFile, $filename);
        
        if ($request->file('file')->isValid()) {
            
            $termsAndConditions = new TermsAndConditions;
            $termsAndConditions->name = $request->name;
            $termsAndConditions->file_name = $filename;
            $termsAndConditions->file_origin_name = $originFileName;
            $termsAndConditions->extension = $extension;
            $termsAndConditions->mime_type = $mimeType;
            $termsAndConditions->is_active = $is_active;
            $termsAndConditions->description = $request->description;
            $termsAndConditions->save();

            return response()->json([
                "success" => true,
                "message" => "New termsAndConditions created successfully.",
                "termsAndConditions" => $termsAndConditions
            ]);
        }
    }

    public function show($id)
    {
        return response()->json([
            "termsAndConditions" => TermsAndConditions::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $termsAndConditions = TermsAndConditions::findOrFail($id);

        $request->validate( [
            'name' => 'required|max:255',
            'is_active' => 'required',
            'description' => 'max:255'
        ]);

        $is_active = $request->is_active == "true" ? true : false;

        if ($request->hasFile('file')) {
            $request->validate( [
                'file' => 'file|mimes:pdf|max:5120',
            ]);
            
            $attachedFile = $request->file('file');
            $originFileNameWithExtension = $attachedFile->getClientOriginalName();
            $filename = $termsAndConditions->filename;
            $originFileName = pathinfo($originFileNameWithExtension, PATHINFO_FILENAME);
            $extension = $attachedFile->getClientOriginalExtension();
            $mimeType = $attachedFile->getClientMimeType();

            $termsAndConditions->file_origin_name = $originFileName;
            $termsAndConditions->extension = $extension;
            $termsAndConditions->mime_type = $mimeType;

            Storage::disk('terms_and_conditions')->putFileAs('/', $attachedFile, $filename);
        }

        if ($request->file('file')->isValid()) {

            $termsAndConditions->name = $request->name;
            $termsAndConditions->is_active = $is_active;
            $termsAndConditions->description = $request->description;
            $termsAndConditions->save();

            return response()->json([
                "success" => true,
                "message" => "TermsAndConditions updated successfully.",
                "termsAndConditions" => $termsAndConditions
            ]);
        }
    }

    public function download($id) {
        $file = TermsAndConditions::findOrFail($id);
        $fileName = $file->file_name;
        $originFile = $file->file_origin_name.".".$file->extension;
        $mimeType = $file->mime_type;
        $headers = [
            'Content-Type' => $mimeType,
            'Content-Encoding' => 'UTF-8',
            'Content-Disposition' => 'attachment',
            'filename' => $originFile,
        ];

        // return [
        //     'fileName' => $fileName,
        //     'originFile' => $originFile,
        //     'mmemeType' => $mimeType
        // ];

        return Storage::disk('terms_and_conditions')->download($fileName, $originFile, $headers);
    }
}
