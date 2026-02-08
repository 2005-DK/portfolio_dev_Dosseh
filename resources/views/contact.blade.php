@extends('layouts.app')

@section('title', 'Contact - Portfolio Dosseh')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 py-12 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-slate-800 rounded-lg shadow-2xl border border-slate-700 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-12">
                <h1 class="text-4xl font-bold text-white mb-2">📧 Contactez-moi</h1>
                <p class="text-purple-100">J'aimerais entendre vos suggestions et vos retours.</p>
            </div>

            <!-- Form -->
            <form id="contactForm" class="p-8 space-y-6">
                @csrf

                <!-- Success Message -->
                <div id="successMessage" class="hidden bg-green-900 border border-green-700 text-green-200 px-4 py-3 rounded-lg" role="alert">
                    <strong>✅ Succès!</strong> Votre message a été envoyé avec succès.
                </div>

                <!-- Error Message -->
                <div id="errorMessage" class="hidden bg-red-900 border border-red-700 text-red-200 px-4 py-3 rounded-lg" role="alert">
                    <strong>❌ Erreur!</strong> <span id="errorText"></span>
                </div>

                <!-- Nom -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-white mb-2">Votre Nom *</label>
                    <input type="text" id="name" name="name" required 
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors" 
                        placeholder="John Doe">
                    <span class="text-red-400 text-sm hidden" id="nameError"></span>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-white mb-2">Votre Email *</label>
                    <input type="email" id="email" name="email" required 
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors" 
                        placeholder="your.email@example.com">
                    <span class="text-red-400 text-sm hidden" id="emailError"></span>
                </div>

                <!-- Sujet -->
                <div>
                    <label for="subject" class="block text-sm font-semibold text-white mb-2">Sujet *</label>
                    <input type="text" id="subject" name="subject" required 
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors" 
                        placeholder="Ex: Proposition de collaboration">
                    <span class="text-red-400 text-sm hidden" id="subjectError"></span>
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-semibold text-white mb-2">Message *</label>
                    <textarea id="message" name="message" rows="6" required 
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 transition-colors resize-none" 
                        placeholder="Votre message ici..."></textarea>
                    <span class="text-red-400 text-sm hidden" id="messageError"></span>
                </div>

                <!-- Bouton -->
                <div class="flex gap-4 pt-4">
                    <a href="/" class="flex-1 px-6 py-3 bg-slate-700 hover:bg-slate-600 text-white rounded-lg transition-colors font-medium text-center">
                        Retour
                    </a>
                    <button type="submit" id="submitBtn" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg transition-all font-medium">
                        📤 Envoyer le Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Info -->
        <div class="mt-8 text-center text-gray-300">
            <p>💡 Votre message m'aidera à vous répondre au plus vite.</p>
        </div>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const successMsg = document.getElementById('successMessage');
    const errorMsg = document.getElementById('errorMessage');
    const errorText = document.getElementById('errorText');
    
    // Hide previous messages
    successMsg.classList.add('hidden');
    errorMsg.classList.add('hidden');
    
    // Disable button
    submitBtn.disabled = true;
    submitBtn.textContent = '⏳ Envoi en cours...';
    
    try {
        const response = await fetch('{{ route("contact.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value,
            }),
        });
        
        const data = await response.json();
        
        if (response.ok) {
            successMsg.classList.remove('hidden');
            form.reset();
            submitBtn.textContent = '📤 Envoyer le Message';
            submitBtn.disabled = false;
        } else {
            errorText.textContent = data.message || 'Une erreur est survenue.';
            errorMsg.classList.remove('hidden');
            submitBtn.textContent = '📤 Envoyer le Message';
            submitBtn.disabled = false;
        }
    } catch (error) {
        errorText.textContent = 'Erreur de connexion: ' + error.message;
        errorMsg.classList.remove('hidden');
        submitBtn.textContent = '📤 Envoyer le Message';
        submitBtn.disabled = false;
    }
});
</script>
@endsection
