<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use App\Models\voter;
use App\Services\VoterService;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function __construct(voter $voter,VoterService $voterService)
    {
        $this->voter = $voter;
        $this->voterService = $voterService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listVoter = $this->voterService->listSearchVoter($request);

        if ($request->ajax()) {
            return view('eleitor.lista')->with('listVoter',$listVoter);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eleitor.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FormVoterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormVoterRequest $request)
    {
        $reques = $request->validated();
        
        $this->voter->create($reques+['voted' => false]);

        return response()->json(['success' => 'Eleitor salvo com sucesso.']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showVoter = $this->voter->find($id);

        return response()->json($showVoter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editVoter = $this->voter->find($id);

        return view('eleitor.edit-register',compact('editVoter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoterRequest $request, $id)
    {
        $this->voter->find($id)->update($request->validated());

        return response ()-> json ([ 'success' => 'Eleitor atualizado com sucesso.' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteVoter = $this->voter->find($id)->delete();

        if($deleteVoter) {
            return response()->json($id);
        }
    }
}
