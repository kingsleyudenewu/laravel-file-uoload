<?php

namespace App\Http\Controllers;

use App\FileUpload;
use Illuminate\Http\Request;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Illuminate\Support\Facades\Validator;
//use Knp\Snappy\Pdf;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FileUploadExport;
//use Barryvdh\DomPDF\Facade as PDF;

use Barryvdh\Snappy\Facades\SnappyPdf;

class FileUploadController extends Controller
{
    public function index(){
        return view('upload');
    }

    public function store(Request $request){
        $rules = [
            'file_upload' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            flash($validator->errors())->error();
            return redirect()->route('upload.index');
        }
            $file_path = $request->file('file_upload')->store('upload');


            $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
            $reader->open($request->file('file_upload')); //open the file
            $i = 0;

            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $key => $row) {
                    if ($key === 1) {
                        continue;
                    }
                    $payload = [
                        'reporting_region' => $row[0],
                        'start_date' => $row[1],
                        'end_date' => $row[2],
                        'upc' => $row[3],
                        'grid' => $row[4],
                        'isrc' => $row[5],
                        'custom_id_1' => $row[6],
                        'custom_id_2' => $row[7],
                        'custom_id_3' => $row[8],
                        'custom_id_4' => $row[9],
                        'google_id' => $row[10],
                        'artist' => $row[11],
                        'product_title' => $row[12],
                        'container_title' => $row[13],
                        'content_provider' => $row[14],
                        'label' => $row[15],
                        'consumer_country' => $row[16],
                        'device_type' => $row[17],
                        'product_type' => $row[18],
                        'interaction_type' => $row[19],
                        'total_play' => $row[20],
                        'partner_revenue_paid' => $row[21],
                        'partner_revenue_currency' => $row[22],
                        'eur_amount' => $row[23],
                    ];

                    FileUpload::create($payload);

                    $i++;
                }
            }

            $reader->close();

        return redirect()->route('upload.index');

    }

    public function all_uploads(){
        return DataTables::of(FileUpload::all())->make(true);
    }



    public function csv_download(Request $request){
        $rules = [
            'field' => 'required|string',
//            'mode' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            flash($validator->errors())->error();
            return redirect()->route('upload.index');
        }

        if($request->field == 'reporting_region'){
            $query = FileUpload::orderBy('reporting_region')->get();
        }
        elseif($request->field == 'product_title'){
            $query = FileUpload::orderBy('product_title')->get();
        }
        elseif($request->field == 'container_title'){
            $query = FileUpload::orderBy('container_title')->get();
        }
        elseif($request->field == 'content_provider'){
            $query = FileUpload::orderBy('content_provider')->get();
        }
        elseif($request->field == 'artist'){
            $query = FileUpload::orderBy('artist')->get();
        }

        $pdf = SnappyPdf::loadView('myPdf', compact('query'));
        return $pdf->download('njo.pdf');



//        return Excel::download(new FileUploadExport, 'new_file.xlsx');



//        $columns = [
//            'Reporting Region' => 'reporting_region',
//            'start_date' => 'start_date',
//            'end_date' => 'end_date',
//            'upc' => 'upc',
//            'grid' => 'grid',
//            'isrc' => 'isrc',
//            'custom_id_1' => 'custom_id_1',
//            'custom_id_2' => 'custom_id_2',
//            'custom_id_3' => 'custom_id_3',
//            'custom_id_4' => 'custom_id_4',
//            'google_id' => 'google_id',
//            'artist' => 'artist',
//            'product_title' => 'product_title',
//            'container_title' => 'container_title',
//            'content_provider' => 'content_provider',
//            'label' => 'label',
//            'consumer_country' => 'consumer_country',
//            'device_type' => 'device_type',
//            'product_type' => 'product_type',
//            'interaction_type' => 'interaction_type',
//            'Total Play' => 'total_play',
//            'Partner Revenue Paid' => 'partner_revenue_paid',
//            'Partner Revenue Currency' => 'partner_revenue_currency',
//            'Amount' => 'eur_amount'
//        ];
//
//        $title = 'NJO Report';
//
//        if($request->field == 'reporting_region'){
//            $query = FileUpload::orderBy('reporting_region')->get();
//        }
//        elseif($request->field == 'product_title'){
//            $query = FileUpload::orderBy('product_title')->get();
//        }
//        elseif($request->field == 'container_title'){
//            $query = FileUpload::orderBy('container_title')->get();
//        }
//        elseif($request->field == 'content_provider'){
//            $query = FileUpload::orderBy('content_provider')->get();
//        }
//        elseif($request->field == 'artist'){
//            $query = FileUpload::orderBy('artist')->get();
//        }
//
////        return CSVReport::of($title, null, $query, $columns)->simple()->download('test_njo');
//        PdfReport::of($title, null, $query, $columns)->limit(20)->download('new_name');


    }
}
