<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Customer Name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Construction of
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Created By
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Created at
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Updated at
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $proposal)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $proposal->customer_name }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $proposal->construction_of }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $proposal->user->name }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $proposal->created_at }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $proposal->updated_at }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <div style="display: flex; gap: 8px;">
                                            <a href="{{ route('proposal.edit', ['proposal' => $proposal->id]) }}">
                                                <x-button type="button">Edit</x-button>
                                            </a>

                                            <form action='javascript:void(0)'
                                                data_url="{{ route('proposal.destroy', [$proposal->id]) }}"
                                                method='post' class='d-inline-block' data-placement='top'
                                                title='Permanent Delete'
                                                onclick="deleteRecord(event, '{{ $proposal->customer_name }}')">
                                                <x-button type="submit" class="destroy"> Delete </x-button>
                                            </form>
                                            <x-button>
                                                <a href="{{ route('proposal.pdf', ['proposal' => $proposal->id]) }}"
                                                    target="_blank">Export as PDF</a>
                                            </x-button>

                                            {{-- <a href="{{ route('proposal.show', ['proposal' => $proposal->id]) }}"
                                                target="_blank">Show</a> --}}
                                            <x-button>
                                                <a href="{{ route('proposal.send', ['proposal' => $proposal->id]) }}">Send
                                                    Email</a>
                                            </x-button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-3">
                    {{ $proposals->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .destroy {
        background-color: #e3342f;
    }

    .destroy:hover {
        background-color: #cc1f1a;
        color: black;
        font-weight: bold;
    }
</style>
<script>
    function deleteRecord(el, customerName) {
        const url = el.currentTarget.getAttribute('data_url');
        var token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: 'Are you sure?',
            text: `${customerName} details will be permanantly deleted!`,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        }).then(function(value) {
            if (value == true) {
                $.ajax({
                    url: url,
                    data: {
                        _token: token,
                        '_method': 'DELETE',
                    },
                    success: function(data) {
                        swal({
                            title: "Success!",
                            type: "success",
                            text: "Click OK",
                            icon: "success",
                            showConfirmButton: false,
                        }).then(function() {
                            location.reload(true);
                        });
                    },
                    error: function(data) {
                        swal({
                            title: 'Opps...',
                            text: "Please refresh your page",
                            type: 'error',
                            timer: '1500'
                        });
                    }
                });
            } else {
                swal({
                    title: 'Cancel',
                    text: "Data is safe.",
                    icon: "success",
                    type: 'info',
                    timer: '1500'
                });
            }
        });
    }
</script>
