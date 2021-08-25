<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Plan;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    public function index($plan_id)
    {
        $features = Feature::where('plan_id', $plan_id)->get();
        $plan = Plan::where('id', $plan_id)->first();
        return view('dash.features.index', ['features' => $features, 'plan' => $plan]);
    }

    public function create($plan_id)
    {
        $plan = Plan::where('id', $plan_id)->first();
        return view('dash.features.create', ['plan' => $plan]);
    }

    public function store(Request $request, $plan_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['plan_id']  = $plan_id;

        Feature::create($data);

        return redirect()->route('dash.features', $plan_id)->with('message', 'Detalhe cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $feature = Feature::find($id); 
        return view('dash.features.edit', ['feature' => $feature]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $store = Feature::find($id);

        $store->update($data);

        return redirect()->route('dash.features', $store->plan_id)->with('message', 'detalhe atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $item = Feature::find($id);
        $item->delete();

        return redirect()
                    ->route('dash.features', $item->plan_id)
                    ->with('message', "Registro: {$item->name}, removido com sucesso!");
    }

}