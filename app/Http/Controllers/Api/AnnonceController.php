<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Repositories\AnnonceRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /** 
     * Display a listing of the resource.
     */

    private $repository;
    function __construct(AnnonceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        return $this->success($this->repository->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $all = $request->all() +["user_id"=>Auth::id()];
        return  $this->success($this->repository->create($all)) ;
    }
   
    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
    {
        //
        return $this->success($this->repository->update($annonce,$request->all()));
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy(Annonce $annonce)
    {
        return $this->repository->delete($annonce);
    } 
}
