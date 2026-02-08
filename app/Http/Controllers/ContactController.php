<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Affiche le formulaire de contact
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Traite l'envoi du formulaire de contact
     */
    public function store(Request $request)
    {
        // Log incoming request for debugging
        \Log::info('Contact form submission', [
            'method' => $request->method(),
            'content_type' => $request->header('Content-Type'),
            'data' => $request->all()
        ]);

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|min:10',
            ]);

            // Sauvegarder le message en base de données
            Message::create($validated + ['is_read' => false]);

            // Envoyer l'email
            Mail::to(config('mail.from.address'))->send(
                new ContactFormSubmitted(
                    $validated['subject'],
                    $validated['name'],
                    $validated['email'],
                    $validated['message']
                )
            );

            return response()->json([
                'success' => true,
                'message' => '✅ Message envoyé avec succès! Je vous répondrai dès que possible.',
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error: ' . implode(', ', array_merge(...array_values($e->errors()))),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Contact form error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
