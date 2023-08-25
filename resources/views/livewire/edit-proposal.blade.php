<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="p-4 mb-4 text-sm text-center text-green-800 rounded-lg bg-green-50" role="alert">
        @if (session('message'))
            <div class="text-green-500">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="mb-4">
        <h2 class="underline text-center font-medium text-4xl">Aggrement</h2>
    </div>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <x-label for="work_to_be_performed">
                    Work to be Performed
                </x-label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="work_to_be_performed" rows="5" wire:model="work_to_be_performed">

                </textarea>
            </div>
            <div class="mb-4">
                <x-label for="work_to_be_performed">
                    Customer
                </x-label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="customer" rows="5" wire:model="customer">

                </textarea>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="mb-4">
                <x-label for="customer_name">
                    Customer Name
                </x-label>
                <x-input id="customer_name" class="border w-full py-2 px-3 outline-none" wire:model="customer_name" />
                @error('customer_name')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-label for="construction_of">
                    Construction of
                </x-label>
                <x-input id="construction_of" class="border w-full py-2 px-3 outline-none"
                    wire:model="construction_of" />
                @error('construction_of')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <hr />
        <div>
            <x-proposal-input-group :array="$overseas_conditions" title="Conditions For Overseas Installations"
                variable="overseas_conditions" />
        </div>

        <hr />
        <div>

            <x-proposal-input-group :array="$base" title="Base" variable="base" />

            <hr />
            <div>
                <x-proposal-input-group :array="$court_preparation" title="Court Preparation" variable="court_preparation" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$surfacing" title="Surfacing" variable="surfacing" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$fence" title="Fence" variable="fence" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$lights" title="Lights" variable="lights" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$court_accessories" title="Court Accessories" variable="court_accessories" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$fee" title="Fee" variable="fee" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$provisions" title="Provisions" variable="provisions" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$conditions" title="Conditions" variable="conditions" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$guarantee" title="Guarantee" variable="guarantee" />
            </div>

            <hr />
            <div>
                <x-proposal-input-group :array="$credit" title="Credit" variable="credit" />
            </div>

            <hr />
            <div class="my-4">
                <x-label for="send_proposal_to">
                    Send Proposal To
                </x-label>
                <x-input type="text" id="send_proposal_to" class="border w-full py-2 px-3 outline-none"
                    wire:model="send_proposal_to" placeholder="Enter email address" />
                @error('send_proposal_to')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-4 flex justify-center">
                <x-button type="submit" class="bg-green-500  hover:bg-green-800 mx-3">Update Proposal</x-button>
                <x-button class="bg-green-500  hover:bg-white-800 mx-3"> <a
                        href="{{ route('proposal.send', ['proposal' => $proposal->id]) }}">Send
                        Email</a>
                </x-button>
                <x-button class="bg-green-500  hover:bg-white-800 mx-3">
                    <a href="{{ route('proposal.pdf', ['proposal' => $proposal->id]) }}" target="_blank">Export as
                        PDF</a>
                </x-button>
            </div>
    </form>
</div>
