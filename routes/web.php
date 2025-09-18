<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::view('/claims', 'claims.index')->name('claims.index');
Route::view('/claims/{id}', 'claims.details')->name('claims.details');

Route::view('/members', 'members.index')->name('members.index');
// Route::view('/members/{id}', 'members.details')->name('members.details');


Route::view('/documents', 'documents.index')->name('documents.index');
Route::view('/messages', 'messages.index')->name('messages.index');
Route::view('/profile', 'profile.index')->name('profile.index');
Route::view('/settings', 'settings.index')->name('settings.index');
Route::view('/deadlines', 'deadlines.index')->name('deadlines.index');
Route::view('/case-notes', 'case-notes.index')->name('case-notes.index');
Route::view('/financials', 'financials.index')->name('financials.index');
Route::view('/case-summary', 'case-summary.index')->name('case-summary.index');


Route::get('/members/{id}', function ($id) {
    $mockMembers = [
        1 => [
            "id" => 1,
            "ID" => "1234-456-14",
            "fullName" => "Jane Doe",
            "gender" => "Female",
            "dob" => "1990-04-12",
            "nationality" => "Zimbabwean",
            "email" => "jane@example.com",
            "phone" => "+263 771 111 222"
        ],
        2 => [
            "id" => 2,
            "ID" => "1234-456-74",
            "fullName" => "John Smith",
            "gender" => "Male",
            "dob" => "1985-09-23",
            "nationality" => "South African",
            "email" => "john@example.com",
            "phone" => "+27 82 345 6789"
        ],
        3 => [
            "id" => 3,
            "ID" => "1234-456-55",
            "fullName" => "Alice Johnson",
            "gender" => "Female",
            "dob" => "1992-02-05",
            "nationality" => "Botswanan",
            "email" => "alice@example.com",
            "phone" => "+267 71 123 456"
        ],
    ];

    $member = $mockMembers[$id] ?? null;

    if (!$member) {
        abort(404, 'Member not found');
    }

    return view('members.details', compact('member'));
})->name('members.details');
