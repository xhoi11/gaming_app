<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFightsRequest;
use App\Models\Fight;
use Illuminate\Http\Request;

class FightController extends Controller
{

    public function index()
    {
        $fights = Fight::all();
        return view('/fights/index', compact('fights'));
    }

    public function create()
    {
        return view('/fights/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeHero = $request->validate([

            'host' => 'required|max:255',
            'guest' => 'required|max:255',
            'winner_id' => 'required|max:255',
            'invited_at' => 'required|max:255',
            'fought_at' => 'required|max:255',
            'host_money_received' => 'required|max:255',
            'guest_money_received' => 'required|max:255',

        ]);

        $fights = Fight::create($storeHero);
        return redirect('fights');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $showfight = Fight::where('id', $id)->first();
        return view('/fights/show', compact('showfight'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editafight = Fight::findOrFail($id);
        return view('/fights/edit', compact('editafight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'host' => 'required|max:255',
            'guest' => 'required|max:255',
            'winner_id' => 'required|max:255',
            'invited_at' => 'required|max:255',
            'fought_at' => 'required|max:255',
            'host_money_received' => 'required|max:255',
            'guest_money_received' => 'required|max:255',
        ]);

        Fight::whereId($id)->update($updateData);
        return redirect('fights');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $fight = Fight::findOrFail($id);
        $fight->users()->delete();
        //
        $fight->delete();

        return redirect('fights');
    }

    public function indexApi()
    {
        $fights = Fight:: all();
        return response()->json(['success' => true, 'data' => $fights]);
    }

    public function storeApi(CreateFightsRequest $request)
    {
        try {
            $storeData = $request->validated();

            $agencycreate = Fight::create($storeData);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
