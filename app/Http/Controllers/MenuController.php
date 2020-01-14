<?php

namespace App\Http\Controllers;


use App\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;


class MenuController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     *
     * @return Factory|View
     */
    public function create()
    {
        $menus = Menu::orderBy('id', 'asc')->get();

        return view('order.create.menus')->with('menus', $menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return false|string
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'        => 'required',
            'info'         => 'required',
            'menu_image'   => 'image|nullable|max:1999',
            'takeout_date' => 'required',
        ]);

        if ($request->hasFile('menu_image')) {

            $filenameWithExt = $request->file('menu_image')
                                       ->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('menu_image')
                                 ->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('menu_image')
                            ->storeAs('public/menu_images', $fileNameToStore);

        } else {

            $fileNameToStore = 'noimage.jpg';
        }


        $menu               = new Menu;
        $menu->title        = $request->input('title');
        $menu->info         = $request->input('info');
        $menu->takeout_date = $request->input('takeout_date');
        $menu->menu_image   = $fileNameToStore;

        $menu->save();

        return redirect('/toevoegen')->withStatus('success', 'Menu Toegevoegd');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return void
     */
    public function edit($id)
    {
        die('menu edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
