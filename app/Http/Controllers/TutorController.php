<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\Tutor;
use App\Http\Requests\TutorRequest;
>>>>>>> 667e956e1cfa6c459ba0f8d7b0c346247c67b0ae

class TutorController extends Controller
{
    /**
<<<<<<< HEAD
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
=======
     *  Lista os tutores com paginação e barra de pesquisa
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $tutors = Tutor::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%{$search}%')
                    ->orWhere('cpf', 'like', '%{$search}%');
            })
            ->orderBy('name', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('tutors.index', compact('tutors', 'search'));
    }

    /**
     * Mostra o formulário de cadastro
     */
    public function create()
    {
        return view('tutors.create');
    }

    /**
     * Salva os dados validados no banco
     */
    public function store(TutorRequest $request)
    {
        Tutor::create($request->validated());

        return redirect()
            ->route('tutors.index')
            ->with('success', 'Tutor cadastrado com sucesso!');
    }

    /**
     * Mostra detalhes de um Tutor
     */
    public function show(Tutor $tutor)
    {
        return view('tutors.show', ['tutor' => $tutor]);
    }

    /**
     * Mostra o formulário de edição
     */
    public function edit(Tutor $tutor)
    {
        return view('tutors.edit', ['tutor' => $tutor]);
    }

    /**
     * Atualiza os dados validados no banco
     */
    public function update(TutorRequest $request, Tutor $tutor)
    {
        $tutor->update($request->validated());

        return redirect()
            ->route('tutors.index')
            ->with('success', 'Tutor atualizado com sucesso!');
>>>>>>> 667e956e1cfa6c459ba0f8d7b0c346247c67b0ae
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(string $id)
    {
        //
=======
    public function destroy(Tutor $tutor)
    {
        $tutor->delete();

        return redirect()
            ->route('tutors.index')
            ->with('success', 'Tutor excluído com sucesso!');
>>>>>>> 667e956e1cfa6c459ba0f8d7b0c346247c67b0ae
    }
}
