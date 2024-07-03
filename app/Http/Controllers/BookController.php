<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Models\UserInfo;

class BookController extends Controller
{
    public function showAllLedgers() {
        $response = Gate::inspect('viewAll');

        if ($response->allowed()) {
            $allBooks = Book::paginate(10);

            return view('acctg.books.viewLedgers')->with(compact('allBooks'));
        } else {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
    }

    public function newLedgerEntry() {
        $response = Gate::inspect('create');

        if ($response->allowed()) {
            return view('acctg.books.newLedger');
        } else {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
    }

    public function viewLedgerDetails($id) {
        $response = Gate::inspect('view');

        if ($response->allowed()) {
            $ledger = Book::find($id);

            if (!$ledger) {
                return redirect()->back()->with('error', 'Ledger not found.');
            }

            $encoderName = UserInfo::where('user_id', $ledger->user_id)->first();

            return view('acctg.books.viewLedger')->with(compact('ledger', 'encoderName'));
        } else {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
    }

    public function saveNewLedgerEntry(Request $request) {
        $validatedData = $request->validate([
            'entry' => 'required|string|max:100',
            'amount' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);
    
        Book::create($validatedData);
    
        return redirect()->route('newledger')->with('success', 'Ledger entry successful');
    }
    

    // public function saveNewLedgerEntry(Request $request) {
    //     $response = Gate::inspect('create');

    //     if ($response->allowed()) {
    //         $validatedData = $request->validate([
    //             'entry' => 'required|string|max:255',
    //             'amount' => 'required|numeric',
    //             'user_id' => 'required|integer'
    //         ]);

    //         $newBook = new Book();
    //         $newBook->entry = $validatedData['entry'];
    //         $newBook->amount = $validatedData['amount'];
    //         $newBook->user_id = $validatedData['user_id'];
    //         $newBook->save();

    //         dd($newBook);


    //         return redirect()->route('ledgers')->with('success', 'New ledger entry created successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Unauthorized access.');
    //     }
    // }
}
