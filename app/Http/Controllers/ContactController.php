<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:100',
            'category' => 'required|string',
            'message'  => 'required|string|min:10|max:2000',
        ], [
            'name.required'     => 'Nama lengkap wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'category.required' => 'Pilih kategori bantuan.',
            'message.required'  => 'Pesan wajib diisi.',
            'message.min'       => 'Pesan minimal 10 karakter.',
        ]);

        return redirect()
            ->route('contact')
            ->with('success', 'Pesan kamu sudah terkirim! Tim SkillNest akan membalas dalam 24 jam.');
    }
}