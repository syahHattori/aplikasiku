<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScanController extends Controller {
    public function scanKode() { return view('scankode'); }
    
    public function processScan(Request $request) {
        $product = Product::where('sku', $request->code)->first();
        if ($product) {
            return response()->json(['success' => true, 'code' => $request->code, 'product' => $product]);
        }
        return response()->json(['success' => false, 'code' => $request->code, 'message' => 'Produk tidak ditemukan.']);
    }

    public function processScanProduk(Request $request) {
        return $this->processScan($request);
    }
    
    // TUGAS 4: Generate QR Code
    public function generateQr($sku) {
        return QrCode::size(300)->generate($sku);
    }
}
