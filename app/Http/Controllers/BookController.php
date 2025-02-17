<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request){
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publish_date = $request->publish_date;
        $book->save();

        return response()->json([
            "message" => "Book Added."
        ], 201);
    }

    public function show($id){
        $book = Book::find($id);
        if (!empty($book)) {
            return response()->json($book);
        }else{
            return response()->json([
                "message" => "Book not found."
            ], 404);
        }
    }

    public function update(Request $request, $id){
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->name = is_null($request->name) ? $book->name : $request->name;
            $book->author = is_null($request->author) ? $book->author : $request->author;
            $book->publish_date = is_null($request->publish_date) ? $book->publish_date : $request->publish_date;

            $book->save();
            return response()->json([
                "message" => "Book updated."
            ], 201);
        }else {
            return response()->json([
                "message" => "Book not found."
            ], 404);
        }
    }

    public function destroy($id){
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->delete();

            return response()->json([
                "message" => "records deleted."
            ], 201);
        }else {
            return response()->json([
                "message" => "Book not found."
            ], 404);
        }
    }
}
