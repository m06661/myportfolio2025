<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    {{-- 🟣 Particles.js achtergrond --}}
    <div id="particles-js" class="fixed inset-0 z-0"></div>

    <div class="relative z-10 py-20 min-h-screen bg-gradient-to-br from-purple-100 to-blue-100 overflow-hidden">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white/80 backdrop-blur-sm shadow-2xl rounded-xl p-10 animate-fade-in border border-purple-200">

                <h1 class="text-4xl font-extrabold text-purple-800 mb-8 text-center drop-shadow">
                    ✨ Neem contact met ons op ✨
                </h1>

                @if (session('success'))
                    <div id="success-message" class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(() => {
                            const msg = document.getElementById('success-message');
                            msg.style.opacity = '0';
                            setTimeout(() => msg.style.display = 'none', 500);
                        }, 3000);
                    </script>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    @foreach ([
                        ['id' => 'naam', 'label' => 'Naam', 'type' => 'text'],
                        ['id' => 'email', 'label' => 'Email', 'type' => 'email'],
                        ['id' => 'onderwerp', 'label' => 'Onderwerp', 'type' => 'text']
                    ] as $field)
                        <div>
                            <label for="{{ $field['id'] }}" class="block text-sm font-medium text-purple-700 mb-1">
                                {{ $field['label'] }}
                            </label>
                            <input type="{{ $field['type'] }}" name="{{ $field['id'] }}" id="{{ $field['id'] }}" required
                                   class="w-full rounded-lg border border-purple-300 shadow-md px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:border-purple-500 transition duration-300 bg-white text-gray-800" />
                        </div>
                    @endforeach

                    <div>
                        <label for="bericht" class="block text-sm font-medium text-purple-700 mb-1">Bericht</label>
                        <textarea name="bericht" id="bericht" rows="5" required
                                  class="w-full rounded-lg border border-purple-300 shadow-md px-4 py-2 focus:ring-2 focus:ring-purple-400 focus:border-purple-500 transition duration-300 bg-white text-gray-800 resize-y"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                                class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-white px-8 py-3 rounded-full text-lg font-semibold shadow-lg transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                            🚀 Verzenden
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- 💫 Animatie + Particle.js --}}
    <style>
        .animate-fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    {{-- ✨ Voeg particles.js toe --}}
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 60
                },
                "color": {
                    "value": "#a78bfa"
                },
                "shape": {
                    "type": "circle"
                },
                "opacity": {
                    "value": 0.3
                },
                "size": {
                    "value": 4
                },
                "move": {
                    "enable": true,
                    "speed": 1.5
                },
                "line_linked": {
                    "enable": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</x-app-layout>
