<?php

namespace App\Managers;

use App\Models\Document;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DocumentRequest;

class DocumentManager{
    public function build(Document $document,DocumentRequest $request ){
        $document->designation= $request->input('designation');  
        $document->description= $request->input('description');
        if($request->hasFile('file')){
            $destination='documents/'.$document->file;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('file');
            $extention=$file->getClientOriginalExtension();
            $filename=$document->designation.'.'.$extention;
            $file->move('documents/',$filename);
            $document->file=$filename;
        } 
        $document->type=$request->input('type'); 
        $document->save();
    }
}