<?php

namespace App\Http\Controllers;

use App\DataTables\PlacesDataTable;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlacesDataTable $dataTable)
    {
        return $dataTable->render('pages.master_data.place.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $body = view('pages.master_data.place.create')->render();
        $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="save()">Save</button>';

        return [
            'title' => 'Buat Tour',
            'body' => $body,
            'footer' => $footer
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        $data = $request->except('_token');
        try {
            if ($request->hasFile('gallery')) {
                $file = $request->file('gallery');

                // Validate the new file
                $request->validate([
                    'gallery.*' => 'mimes:jpg,jpeg,png|max:2048',
                ]);

                // Determine the new file name
                $gallery = "";
                foreach ($file as $key => $value) {
                    $filename = Str::uuid()->toString() . '' . time() . '.' . $value->getClientOriginalExtension();
                    if ($key == count($file) - 1) {
                        $gallery .= $filename;
                    } else {
                        $gallery .= $filename . ',';
                    }
                }

                // Delete the old profile image if it exists
                // if ($user->profile_picture && file_exists(public_path('upload/' . $user->profile_picture))) {
                //     unlink(public_path('upload/' . $user->profile_picture));
                // }

                // Save the new file
                // $path = $file->move(public_path('upload'), $filename);

                // Update the form data with the new file name
                $data['gallery'] = $gallery;
            }
            $trx = Place::create([
                'uid' => Str::uuid()->toString(),
                'name' => $data['name'],
                'address' => $data['address'],
                'gallery' => $data['gallery'],
                'description' => $data['description'],
            ]);
            if ($trx) {
                if ($request->hasFile('gallery')) {
                    $file = $request->file('gallery');
                    $namefile = explode(',', $data['gallery']);
                    foreach ($file as $key => $value) {
                        $path = $value->move(public_path('upload'), $namefile[$key]);
                    }
                }
                return response([
                    'status' => true,
                    'message' => 'Berhasil Membuat Role'
                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Gagal Membuat Role'
                ], 400);
            }
        } catch (\Throwable $th) {
            dd($th);
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal'
            ], 400);
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $place = Place::find($uid);
        if ($place) {
            $uid = $place->uid;
            $data = $place;
            $body = view('pages.master_data.place.edit', compact('uid', 'data'))->render();
            $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>';
            return [
                'title' => 'Edit Tour & Trip',
                'body' => $body,
                'footer' => $footer
            ];
        } else {
            return response([
                'status' => false,
                'message' => 'Failed Connect to Server'
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        $formData = $request->except(["_token", "_method"]);
        try {
            $place = Place::find($uid);
            $trx = $place->update($formData);
            if ($trx) {
                return response([
                    'status' => true,
                    'message' => 'Data Berhasil Diubah'
                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Data Gagal Diubah'
                ], 400);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal',
            ], 400);
        } catch (\Illuminate\Database\QueryException $e) {
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        try {
            $place = Place::find($uid);
            $delete = $place->delete();
            if ($delete) {
                return response()->json([
                    'message' => 'Berhasil Menghapus Data'
                ]);
            } else {
                return response()->json([
                    'message' => 'Gagal Menghapus Data'
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Data Failed, this data is still used in other modules !'
            ]);
        }
    }
}
