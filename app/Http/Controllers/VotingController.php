<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\CountVote;
use App\Models\voter;
use App\Services\VotingService;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function __construct(candidate $candidate,CountVote $countVote,voter $voter,VotingService $votingService)
    {
        $this->candidate = $candidate;
        $this->countVote = $countVote;
        $this->voter = $voter;
        $this->votingService = $votingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $candidateVote = $this->votingService->votacionCandidate();

        if ($request->ajax()) {
            return response()->json($candidateVote);
        }

        return view('votacion.vote',compact('candidateVote','id'));
    }

    public function createVerific()
    {
        return view('votacion.select-voter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FormVoterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function verificVoter(Request $request)
    {
        $request = $request->all();
        $verificVoter = $this->votingService->VerificEmailVoter($request);
        
        if($verificVoter){
            return redirect()->route('voting.indexi',['id' => $verificVoter->id]);
        }else{
            return redirect()->back()->with('status', 'Esse email já foi utilizado para votação');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->countVote->updateOrCreate([
            'candidate_id' => $request->name,
            'votes' => 0
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVotes($ed, $id)
    {
        $this->voter->where('id',$ed)->update([
            'voted' => true,
        ]);
        
        $this->votingService->countVoto($id);

        return response()->json(['success' => 'Candidato salvo com sucesso.']);     
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showResult()
    {
        $resultVote = $this->votingService->votosCandidates();

        return view('votacion.show-result',compact('resultVote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}