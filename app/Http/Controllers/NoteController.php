<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\NoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        // return response()->json(Note::all(),200);
        /**
         * Con NoteResource se transforma los datos a un formato especificado para que se devuelven en las respuestas json 
         * NoteResource::collection() se usa para devolver una coleccion de datos
        {
	       "data": [
                {
                    "id": 1,
                    "title": "Title: hello every body",
                    "description": "Description: lorem ipsum secum dolor",
                    "example": "This is an Example"
                },
                .
                .
                .
            ]
        }
         */
        return NoteResource::collection(Note::all());
    }

    /**
     * Show the form for creating a new resource.
     * A diferencia de las rutas web, las rutas api no tienen vistas, por lo que no se necesita un metodo create
     * Entonces se usa el metodo store para crear una nota 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 201: codigo de estado que indica que se creo un recurso
     * Cuando se crea un recurso es habitual devolver el recurso creado
     */
    public function store(NoteRequest $request):JsonResponse
    {
        $note=Note::create($request->all());
        // return response()->json(["message"=>"Note created","data"=>$note],201);
        return response()->json(["message"=>"Note created","data"=>new NoteResource($note)],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        $note=Note::find($id);
        return response()->json($note,200);
    }

    /**
     * Show the form for editing the specified resource.
     * A diferencia de las rutas web, las rutas api no tienen vistas, por lo que no se necesita un metodo edit
     * Entonces se usa el metodo update para actualizar una nota
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 200: codigo de estado que indica que se actualizo un recurso
     * Cuando se actualiza un recurso es habitual devolver el recurso actualizado
     */
    public function update(NoteRequest $request, string $id):JsonResponse
    {
        $note=Note::find($id);
        //forma 1
        // $note->update($request->all());
        //forma 2
        $note->title=$request->title;
        $note->description=$request->description;
        $note->save();
        return response()->json(["message"=>"Note updated","data"=>$note],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        $note=Note::find($id);
        $note->delete();
        return response()->json(["message"=>"Note deleted"],200);
    }
}
