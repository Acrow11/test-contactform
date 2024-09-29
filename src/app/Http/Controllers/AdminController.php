<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
{
    
    $contacts = Contact::all();  
    return view('admin.index', compact('contacts'));
}

public function search(Request $request)
{
    $query = Contact::query();

    // 検索条件の処理
    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }
    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }
    if ($request->filled('gender') && $request->gender != '全て') {
        $query->where('gender', $request->gender);
    }
    if ($request->filled('contact_type')) {
        $query->where('contact_type', $request->contact_type);
    }
    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    // ページネーション
    $contacts = $query->paginate(7);

    return view('admin.search', compact('contacts'));
}

public function destroy($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();
    return redirect()->back()->with('success', '削除しました');
}

public function export(Request $request)
{
    // CSVエクスポート処理
}


}
