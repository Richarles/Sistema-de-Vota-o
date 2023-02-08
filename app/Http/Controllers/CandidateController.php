<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\candidate;
use App\Models\CountVote;
use App\Services\CandidateService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CandidateController extends Controller
{
    public function __construct(candidate $candidate,CandidateService $candidateService,CountVote $countVote)
    {
        $this->candidate = $candidate;
        $this->candidateService = $candidateService;
        $this->countVote = $countVote;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listCandidate = $this->candidateService->listCandidate($request);
        
        if ($request->ajax()) {
            return view('candidato.lista')->with('listCandidate',$listCandidate);
         }
    }

    // public function indexVote()
    // {
    //     $candidateVote = $this->candidateService->listCandidate();

    //     return view('votacion.vote',compact('candidateVote'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidato.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FormCandidateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormCandidateRequest $request)
    {
        $validate = $request->validated();

        $validate['profile_photo'] = $this->candidateService->uploadPhoto($validate);
        
        $createCandidate = $this->candidate->create($validate+['checked' => false]);

        if ($createCandidate) {    
            return response()->json(['success' => 'Candidato salvo com sucesso.']);
        }
    }

    public function checkedCandidate($id)
    {
        $idCandidate = $this->candidate->find($id);

        $idCandidate->update(['checked' => $idCandidate->checked == false ? true : false]);

        if($idCandidate->checked == true){
            $this->countVote->updateOrCreate([
                'candidate_id' => $idCandidate->id,
                'votes' => 0
            ]);
        }

        return response()->json($idCandidate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showCandidate = $this->candidate->find($id);
        
        return response()->json($showCandidate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCandidate = $this->candidate->find($id);

        return view('candidato.edit-register',compact('editCandidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidateRequest $request, $id)
    {
        $validate = $request->validated();
        
        $validate['profile_photo'] = $this->candidateService->uploadPhoto($validate);
        $idCandidate =  $this->candidate->find($id);

        $updateCandidate =  $idCandidate->update($validate+['checked' => $idCandidate->checked]);

        if ($updateCandidate) {
            return response()->json(['success' => 'Candidato alterado com sucesso.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCandidate = $this->candidate->find($id)->delete();

        if ($deleteCandidate) {
            return response()->json($id);
        }
    }
}
