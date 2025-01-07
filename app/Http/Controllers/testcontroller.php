<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Investigation;
use PHPUnit\Framework\MockObject\Invocation;

class testcontroller extends Controller
{

    public function index(){
        $tests=Investigation::all();
           $tests = Investigation::orderBy('created_at', 'asc')->simplepaginate(6);
           return view('admindashboard.investigations',compact('tests'));
    }
    public function create()
{
    return view('admindashboard.createinvestigation');
}
public function edit($id)
{ 
    $investigation=Investigation::find($id);
    return view('admindashboard.editinvestigation',compact('investigation'));
}
public function update(Request $request,$id)
{$investigation=Investigation::find($id);
    $investigation->name = $request->input('name');
    $investigation->instructions = $request->input('instructions');
    $investigation->price = $request->input('price');
    $investigation->details= $request->input('details');
    $investigation->expected_time_for_test = $request->input('expected_time_for_test');
    $investigation->status = $request->input('status');
    $investigation->can_taken = $request->input('can_taken');
    $investigation->update();
    return redirect()->route('investigations.index')->with('success', 'Item updated successfully!');
}

    public function search()
    {
        $search_text=$_GET['search'];
        $tests=Investigation::where('name','like','%'.$search_text.'%')->get();
        return view('search',compact('tests'));

    }
    public function searchfor()
    {
        $search_text=$_GET['search'];
        $tests=Investigation::where('name','like','%'.$search_text.'%')->get();
        return view('admindashboard.search',compact('tests'));

    }
    public function show($id)
    {
        $test = Investigation::find($id);
        return view('admindashboard.investigation', compact('test'));;
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:1000'],
            'details' => ['required', 'string', 'min:3', 'max:1000'],
            'price' => ['required', 'numeric'],
            'expected_time_for_test' => ['required', 'string', 'min:3', 'max:1000'],
            'status' => ['required', 'string', 'min:3', 'max:1000'],
            'can_taken' => ['required', 'boolean'],
        ]);
        $investigation = Investigation::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'expected_time_for_test' => $request->expected_time_for_test,
            'instructions' => $request->instructions,
            'status' => $request->status,
            'can_taken' => $request->can_taken,
            
        ]);
        return redirect()->route('investigations.show', ['id' => $investigation->id]);

    }
    public function delete($id){
        $test = Investigation::find($id);
        if ($test) {
            $test->delete();
            return redirect()->back()->with('success', 'Investigation  Delete it!');
        }
    }
    

}

