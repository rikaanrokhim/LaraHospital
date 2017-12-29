<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function index($room = null)
    {
        $search = request()->input('search');
        $rooms = Room::oldest()->search($search)->paginate(5);
        $edit = isset($room) ? Room::find($room) : null;

        return view('member.rooms', [
            'search' => $search,
            'rooms'  => $rooms,
            'edit'   => $edit,
        ]);
    }

    public function store(Request $request)
    {
        $this->validat(request(), [
            'room_type_id' => 'required',
            'code'         => 'required',
            'name'         => 'required',
            'status_id'    => 'required',
            'service'      => 'required|min:10',
            'fare'         => 'required',
            'location'     => 'required',
            'information'  => 'required|min:10',
            'stock'        => 'required',
        ]);

        $input = $request->all();
        $input['image'] = null;

        if ($request->hasFile('image')) {
            $input['image'] = '/images/room/' . str_slug($input['name'], '-') . '.' .
                               $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/room/'), $input['image']);
        }

        Room::create($input);

        return back()->withSuccess('Data berhasil ditambahkan!');
    }

    public function update(Request $request, Room $room)
    {
        $this->validat(request(), [
            'room_type_id' => 'required',
            'code'         => 'required',
            'name'         => 'required',
            'status_id'    => 'required',
            'service'      => 'required|min:10',
            'fare'         => 'required',
            'location'     => 'required',
            'information'  => 'required|min:10',
            'stock'        => 'required',
        ]);

        $input = $request->all();
        $input['image'] = $room->image;

        if ($request->hasFile('image')) {
            if (!$room->image == NULL) {
                unlink(public_path($room->image));
            }
            $input['image'] = '/images/room/' . str_slug($input['name'], '-') . '.' .
                               $request->image->getClientOriginalExtension();
            $input->image->move(public_path('/images/room/'), $input['image']);
        }

        $room->update($input);

        return redirect()->route('member.rooms')->withInfo(
            'Data berhasil diubah!'
        );
    }

    public function destroy(Room $room)
    {
        if (!$room->image == NULL) {
            unlink(public_path($room->image));
        }

        $room->delete();

        return back()->withDanger('Data berhasil dihapus!');
    }
}
