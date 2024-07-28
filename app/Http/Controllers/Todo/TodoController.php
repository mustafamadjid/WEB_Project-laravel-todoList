<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{


    



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        if(request('search')){
            $data  =Todo::where('task','like','%'.request('search').'%')->get();
        }else{

            $data = Todo::where('id_user',$userId)
                        ->orderBy("task","asc")->get();
            
        }
        
        return view('todo.app',['data' => $data]);
        
        
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
        $userId = auth()->id();
        

        $request->validate([
            'task'=> 'required|min:3|max:25',
        ],[
            'task.required'=>'Task Wajib Diisi',
            'task.min'=>'Minimal Judul Task Adalah 3 Karakter',
            'task.max'=>'Maksimal Judul Task Adalah 25 Karakter',
        ]);

        $data = [
            'task' => $request->input('task'),
            'id_user'=> $userId,
        ];

        

        Todo::create($data);
        return redirect()->route('todo')->with('success','Berhasil Simpan Data');
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
        $request->validate([
            'task'=> 'required|min:3|max:25',
        ],[
            'task.required'=>'Task Wajib Diisi',
            'task.min'=>'Minimal Judul Task Adalah 3 Karakter',
            'task.max'=>'Maksimal Judul Task Adalah 25 Karakter',
        ]);

         $data = [
            'task' => $request->input('task'),
            'is_done' => $request->input('is_done'),
        ];

        Todo::where('id', $id)->update($data);
        return redirect()->route('todo')->with('success','Berhasil Memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::where('id', $id)->delete();
        return redirect()->route('todo')->with('success','Berhasil Menghapus data');
    }
}
