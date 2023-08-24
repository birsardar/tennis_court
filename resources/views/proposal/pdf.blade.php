<x-app-layout>
    <div class="flex items-center">
        <div class="logo1 mr-2">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($data['logo1Url'])) }}" alt="logo">
        </div>
        <div class="logo2">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($data['logo2Url'])) }}" alt="logo">
        </div>
    </div>

    <h1>Proposal Details</h1>
    <p>Proposal ID: {{ $proposal->id }}
        {{ $proposal->proposal_title }}
        </div>
</x-app-layout>
