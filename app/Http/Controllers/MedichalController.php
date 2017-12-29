<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medichal;

class MedichalController extends Controller
{
    public function index($medichal = null)
    {
        $search = request()->input('search');
        $medichals = Medichal::oldest()->search($search)->paginate(5);
        $edit = isset($medichal) ? Medichal::find($medichal) : null;

        return view('member.medichals', [
            'search'    => $search,
            'medichals' => $medichals,
            'edit'      => $edit,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'        => 'required|min:5',
            'user_id'     => 'required',
            'status_id'   => 'required',
            'type'        => 'required',
            'location'    => 'required|min:5',
            'open'        => 'required',
            'information' => 'required|min:10',
        ]);

        $input = $request->all();
        $input['image'] = null;

        if ($request->hasFile('image')){
            $input['image'] = '/images/medichal/' . str_slug($input['name'], '-') . '.' .
                               $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/medichal/'), $input['image']);
        }

        Medichal::create($input);

        return back()->withSuccess('Data berhasil ditambahkan!');
    }

    public function update(Request $request, Medichal $medichal)
    {
        $this->validate(request(), [
            'name'        => 'required|min:5',
            'user_id'     => 'required',
            'status_id'   => 'required',
            'type'        => 'required',
            'location'    => 'required|min:5',
            'open'        => 'required',
            'information' => 'required|min:10',
        ]);

        $input = $request->all();
        $input['image'] = $medichal->image;

        if ($request->hasFile('image')){
            if (!$medichal->image == NULL){
                unlink(public_path($medichal->image));
            }
            $input['image'] = '/images/medichal/'. str_slug($input['name'], '-'). '.' .
                               $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/medichal/'), $input['image']);
        }

        $medichal->update($input);

        return redirect()->route('member.medichals')->withInfo(
            'Data berhasil diubah!'
        );
    }

    public function destroy(Medichal $medichal)
    {
        if (!$medichal->image == NULL) {
            unlink(public_path($medichal->image));
        }

        $medichal->delete();

        return back()->withDanger('Data berhasil dihapus!');
    }
}
