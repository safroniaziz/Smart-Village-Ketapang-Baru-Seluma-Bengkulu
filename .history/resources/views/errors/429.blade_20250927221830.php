@extends('errors.layout')

@section('title', 'Too Many Requests')

@section('error-code', '429')

@section('error-message', 'Terlalu Banyak Permintaan')

@section('error-description')
    <p class="text-gray-600 mb-6">
        Anda telah mengirim terlalu banyak permintaan dalam waktu singkat. 
        Silakan tunggu beberapa saat sebelum mencoba lagi.
    </p>
    
    @if(isset($retryAfter))
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-yellow-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
                <p class="text-yellow-800">
                    Silakan coba lagi dalam <span class="font-semibold">{{ $retryAfter }}</span> detik.
                </p>
            </div>
        </div>
    @endif
@endsection

@section('additional-scripts')
<script>
    @if(isset($retryAfter))
        // Countdown timer
        let retryAfter = {{ $retryAfter }};
        const countdownElement = document.querySelector('.font-semibold');
        
        const countdown = setInterval(() => {
            retryAfter--;
            if (countdownElement) {
                countdownElement.textContent = retryAfter;
            }
            
            if (retryAfter <= 0) {
                clearInterval(countdown);
                // Auto refresh page when countdown reaches 0
                location.reload();
            }
        }, 1000);
    @endif
</script>
@endsection