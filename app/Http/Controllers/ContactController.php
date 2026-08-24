<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the Contact page: Contact Information, WhatsApp CTA,
     * Contact Form, Google Maps.
     */
    public function index(): View
    {
        return view('pages.contact');
    }

    /**
     * Handle the contact form submission.
     *
     * Validates and confirms receipt via a flash message. Does not send
     * email yet — no mail transport is configured in this environment;
     * wiring a Mailable is a follow-up, not in this task's scope.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:30'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return redirect()
            ->route('contact')
            ->with('status', 'Terima kasih! Pesan Anda telah kami terima dan tim kami akan segera menghubungi Anda.');
    }
}
