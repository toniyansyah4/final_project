<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\JenisKelamin;
use App\Models\StatusPatients;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AppController extends Controller
{
    public function index()
    {
        $patients = Patients::with('jenisKelamin')->with('statusPatients')->get();
        if (!$patients) {
            return response()->json(200);
        } else {
            return response()->json([
                'rc'       => 200,
                'patients' => $patients
            ]); 
        }
    }

    public function store(Request $request)
    {

        $req    = [
            'name'                 => $request->name,
            'jk_id'                => $request->jk_id,
            'phone'                => $request->phone,
            'address'                => $request->address,
            'status_id'                => $request->status_id,
            'in_date_at'                => $request->in_date_at,
            'out_date_at'                => $request->out_date_at,
        ];

        $validator = Validator::make($req, [
            'name' => ['required'],
            'jk_id' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'status_id' => ['required'],
            'in_date_at' => ['required'],
            'out_date_at' => ['required'],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 201);
        }
        $patients = new Patients();
        $patients->name = $req['name'];
        $patients->jk_id = $req['jk_id'];
        $patients->phone = $req['phone'];
        $patients->address = $req['address'];
        $patients->status_id = $req['status_id'];
        $patients->in_date_at = $req['in_date_at'];
        $patients->out_date_at = $req['out_date_at'];
        $patients->save();

        return [
            'rc'        => 200,
            'message'   => 'Success add Data',
            'patients'  => $patients
        ];
        
    }

    public function show($id)
    {
        $req    = [
            'id'    => $id
        ];

        $validator = Validator::make($req, [
            'id'   => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $patients = Patients::with('jenisKelamin')->with('statusPatients')->where('id', $req['id'])->first();

        return [
            'rc'        => 200,
            'message'   => 'Success get patients',
            'data'      => [
                'patients'  => $patients,
            ]
        ];
    }

    public function update(Request $request, $id)
    {
        $req    = [
            'name'                 => $request->input('name'),
            'jk_id'                => $request->input('jk_id'),
            'phone'                => $request->input('phone'),
            'address'                => $request->input('address'),
            'status_id'                => $request->input('status_id'),
            'in_date_at'                => $request->input('in_date_at'),
            'out_date_at'                => $request->input('out_date_at'),
        ];

        $validator = Validator::make($req, [
            'name' => ['required'],
            'jk_id' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'status_id' => ['required'],
            'in_date_at' => ['required'],
            'out_date_at' => ['required'],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 201);
        }

        $patients = Patients::where('id', $id)->first();
        if (!$patients) {
            return [
                'rc' => 404,
                'message' => 'Not Found'
            ];
        }
        $patients->name = $req['name'];
        $patients->jk_id = $req['jk_id'];
        $patients->phone = $req['phone'];
        $patients->address = $req['address'];
        $patients->status_id = $req['status_id'];
        $patients->in_date_at = $req['in_date_at'];
        $patients->out_date_at = $req['out_date_at'];
        $patients->save();

        return [
            'rc'        => 200,
            'message'   => 'Success Update patients',
            'data'      => [
                'patients'  => $patients,
            ]
        ];
    }

    public function destroy($id)
    {
        $req    = [
            'id'    => $id
        ];

        $validator = Validator::make($req, [
            'id'   => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 201);
        }

        $patients = Patients::where('id', $id)->first();
        if (!$patients) {
            return [
                'rc' => 404,
                'message' => 'Not Found'
            ];
        }
        $patients->delete();
            return [
                'rc' => 200,
                'message' => 'Deleted Succesfully'
            ];
    }

    public function search($name)
    {
        $req    = [
            'name'    => $name
        ];

        $validator = Validator::make($req, [
            'name'   => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 201);
        }
        $patients = Patients::with('jenisKelamin')->with('statusPatients')->where('name', $name)->first();
        if (!$patients) {
            return [
                'rc' => 404,
                'message' => 'Not Found'
            ];
        }


        return [
            'rc'        => 200,
            'message'   => 'Success get patients',
            'data'      => [
                'patients'  => $patients,
            ]
        ];
    }

    public function positive()
    {
        $patients = Patients::with('jenisKelamin')->with('statusPatients')->where('status_id', 1)->first();
        if (!$patients) {
            return [
                'rc' => 404,
                'message' => 'Not Found'
            ];
        }


        return [
            'rc'        => 200,
            'message'   => 'Success get patients',
            'data'      => [
                'patients'  => $patients,
            ]
        ];
    }

    public function recovered()
    {
        $patients = Patients::with('jenisKelamin')->with('statusPatients')->where('status_id', 2)->first();
        if (!$patients) {
            return [
                'rc' => 404,
                'message' => 'Not Found'
            ];
        }


        return [
            'rc'        => 200,
            'message'   => 'Success get patients',
            'data'      => [
                'patients'  => $patients,
            ]
        ];
    }

    public function dead()
    {
        $patients = Patients::with('jenisKelamin')->with('statusPatients')->where('status_id', 3)->first();
        if (!$patients) {
            return [
                'rc' => 404,
                'message' => 'Not Found'
            ];
        }


        return [
            'rc'        => 200,
            'message'   => 'Success get patients',
            'data'      => [
                'patients'  => $patients,
            ]
        ];
    }
}
