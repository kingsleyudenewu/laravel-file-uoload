<?php

namespace App\Http\Controllers;

use App\FileUpload;
use Illuminate\Http\Request;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
use Illuminate\Support\Facades\Storage;
//use Importer;
use Illuminate\Support\Facades\Validator;

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
//        try {
//            $fileName = $request->file('file_upload')->getClientOriginalName();

            $file_path = $request->file('file_upload')->store('upload');

//        if(Storage::disk('local')->exists('file.txt')) return 'true';
//        else return 'false';

//            $excel = Importer::make('Excel');
//            $excel->load($request->file('file_upload'));
//            $collection = $excel->getCollection();
//            dd($collection);



            $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
            $reader->open($request->file('file_upload')); //open the file

            $val = [];
            $i = 0;

            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $key => $row) {
                    // do stuff with the row
//                    $val[] = $row;
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
            echo "Total Rows : " . $i;
            $reader->close();
//        }
//        catch (\Exception $exception){
//            flash('Operation Failed')->error();
//            return redirect()->route('upload.index');
//        }

    }
}
