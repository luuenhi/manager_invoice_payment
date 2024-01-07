<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cashier;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice_code = Str::random(5) . '_' . now()->timestamp;
        $cashier = Auth::user();
        $customers = Customer::orderBy('cus_name')
            ->orderByDesc('created_at')->get();
        $products = Product::orderBy('product_name')
            ->orderByDesc('created_at')->get();
        return view('invoices.create', compact('cashier', 'customers', 'products', 'invoice_code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InvoiceStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $params = $request->all();
            $products = Product::all();
            $pointUsed = isset($params['customer_pointed']) ? $params['customer_pointed'] : 0;
            $customer = Customer::where('id', $params['customer_id'])->first();
            if (isset($customer->loyaltyCard)) {
                $loyaltyCard = $customer->loyaltyCard;
                $point = (int)$loyaltyCard->point + (int)((int)$params['price_total'] / 10000);
                if ((int)$pointUsed <= (int)$loyaltyCard->point) {
                    $point = $point - (int)$pointUsed;
                } else {
                    return response()->json([
                        'message' => 'So diem su dung lon hon so diem khach hang dang co'
                    ], Response::HTTP_BAD_REQUEST);
                }
                $loyaltyCard->update([
                    'point' => $point
                ]);
            }

            $invoice = Invoice::create([
                'invoice_code' => $params['invoice_code'],
                'invoice_date' => now(),
                'point_used' => $pointUsed,
                'price_total' => $params['price_total'],
                'customer_id' => $params['customer_id'],
                'cashier_id' => Auth::user()->id,
            ]);

            $invoiseDetails = [];
            foreach ($params['products'] as $product) {
                $invoiseDetail = [];
                $productInfo = $products->first(function ($item) use ($product) {
                    return $item->id == $product['id'];
                });
                $invoiseDetail['price_now'] = $productInfo->price;
                $invoiseDetail['quantity'] = $product['amount'];
                $invoiseDetail['cur_date'] = now();
                $invoiseDetail['product_id'] = $product['id'];
                $invoiseDetail['invoice_id'] = $invoice->id;
                $invoiseDetail['created_at'] = now();
                $invoiseDetail['updated_at'] = now();
                array_push($invoiseDetails, $invoiseDetail);
            }
            InvoiceDetail::insert($invoiseDetails);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::info($e);
            return response()->json([
                'message' => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([], Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderByDesc('created_at')->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::with([
            'customer',
            'cashier',
            'invoiceDetails'
        ])->where('id', $id)->first();
        if (empty($invoice)) {
            flash('Không tồn tại hóa đơn có id là' . $id)->error();
            return back();
        }
        return view('invoices.detail', compact('invoice'));
    }
}
