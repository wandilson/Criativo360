<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{

    public function index()
    {
        $plans = Plan::all();
        return view('dash.plans.index', ['plans' => $plans]);
    }

    public function create()
    {
        return view('dash.plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = $request->all();

        $price = str_replace(".", "", $data['price']);
        $data['price'] = str_replace(',', '.', $price);

        $data['url'] = Str::slug($data['name'], '-');
        

        Plan::create($data);

        return redirect()->route('dash.plans')->with('message', 'Plano cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $plan = Plan::find($id); 
        return view('dash.plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $store = Plan::find($id);

        $price = str_replace(".", "", $data['price']);
        $data['price'] = str_replace(',', '.', $price);


        if(isset($data['slug']) == 1){
            $data['url'] = Str::slug($data['name'], '-');
        }

        $data['recomended'] = (!isset($data['recomended']))? 0 : 1;


        $store->update($data);

        return redirect()->route('dash.plans')->with('message', 'Plano atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $item = Plan::find($id);
        $item->delete();

        return redirect()
                    ->route('dash.plans')
                    ->with('message', "Registro: {$item->name}, removido com sucesso!");
    }

}