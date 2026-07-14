<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductWebController extends Controller {
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Product::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('formatted_price', function($row) { 
                    return 'Rp ' . number_format($row->price, 0, ',', '.'); 
                })
                ->addColumn('action', function($row){
                    return '<button type="button" class="btn btn-danger btn-sm" onclick="deleteProduct('.$row->id.')">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('products.index');
    }

    public function destroy($id) {
        Product::findOrFail($id)->delete();
        return response()->json(['success' => 'Data Produk berhasil dihapus permanen.']);
    }
}
