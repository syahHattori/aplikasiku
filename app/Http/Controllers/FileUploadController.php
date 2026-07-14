<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller {
    public function showUploadForm() { return view('upload'); }

    public function storeFile(Request $request) {
        $request->validate(['file' => 'required|image|mimes:jpg,jpeg,png|max:2048']);
        $path = $request->file('file')->store('public/uploads');
        return back()->with('success', 'File berhasil diupload!')->with('file', $path);
    }

    public function listFiles() {
        $files = Storage::files('public/uploads');
        return view('file_list', compact('files'));
    }

    public function deleteFile($filename) {
        Storage::delete('public/uploads/' . $filename);
        return back()->with('success', 'File berhasil dihapus!');
    }
}