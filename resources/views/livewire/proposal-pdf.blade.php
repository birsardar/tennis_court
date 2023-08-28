<div style="margin: 20px;">
    <div class='logo'>
        <div class="logo1">
            <img src="{{ $data['logo1Url'] }}" alt="logo1">
        </div>
        <div class="logo2">
            <img src="{{ $data['logo2Url'] }}" alt="logo2">
            <p class="sologan">CONSTRUCTION CO</p>
            <p>CELEBRATING OUR 50TH YEAR 1972-2022</p>
            <p>“QUALITY STILL EXISTS”</p>
        </div>
    </div>
    <div class="agreement">
        <h2>Agreement</h2>
    </div>
    <div class="my-4">
        <div class="table-content">
            <table>
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>WORK TO BE PERFORMED</th>
                        <th>CUSTOMER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $proposal->work_to_be_performed }}</td>
                        <td>
                            {{ $proposal->customer_name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="agreement-page">
        <p style="text-align: justify;">
            Agreement made between Agile Courts Construction Company, Inc. hereinafter called the Contractor
            and test hereinafter called the Customer for the construction of (2) tennis courts and refurbishment of
            (3) tennis courts of test with respect to the following terms and specifications
        </p>
    </div>
    <div class="my-4 overseas-installation">
        @if ($proposal->showoverseas == true)
            <h2>CONDITIONS FOR OVERSEAS INSTALLATIONS</h2>
            @foreach ($proposal->overseas_conditions as $condition)
                <div class="condition">
                    @if ($condition['selected'] == 'Yes')
                        <p>{{ str_replace('_________________', $condition['input_value'], $condition['title']) }}</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4 baseclass">
        @if ($proposal->showbase == true)
            <h2>BASE</h2>
            @foreach ($proposal->base as $data)
                <div class="base">
                    @if ($data['selected'] == 'Yes')
                        <p>{{ str_replace('_____________', $data['input_value'], $data['title']) }}</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4">
        @if ($proposal->showfence == true)
            <h2>Fence</h2>
            @foreach ($proposal->fence as $item)
                @if ($item['selected'] === true)
                    <div class="fence-item">
                        @if (isset($item['multiple_inputs']) && count($item['multiple_inputs']) > 0)
                            <p>
                                The Contractor will install 10’’ high fence; zinc coated Heavy Duty steel wire chain
                                link with a green or
                                black vinyl coating,
                                @foreach ($item['multiple_inputs'] as $input)
                                    {{ $input['value'] }}{{ $input['title'] }}
                                @endforeach
                            </p>
                            {{-- <p>{{ $input['value'] }}{{ $input['title'] }}</p> --}}
                        @else
                            <p>{{ str_replace('________', '', $item['title']) }}</p>
                        @endif
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    <div class="my-4 lightclass">
        @if ($proposal->showlights == true)
            <h2>LIGHTS</h2>
            @foreach ($proposal->lights as $lights)
                <div class="light">
                    @if ($lights['selected'] == 'Yes')
                        <div class="light-item">
                            @if (isset($lights['multiple_inputs']) && count($lights['multiple_inputs']) > 0)
                                <p>
                                    The Contractor will furnish and install () BLS () watt LED fixtures, mounted on
                                    @foreach ($lights['multiple_inputs'] as $input)
                                        {{ $input['value'] }}
                                        {{-- {{ $input['title'] }} --}}
                                    @endforeach
                                    ft . high
                                    aluminum/steel light poles.
                                </p>
                                {{-- <p>{{ $input['value'] }}{{ $input['title'] }}</p> --}}
                            @else
                                <p>{{ str_replace('________', '', $lights['title']) }}</p>
                            @endif
                        </div>
                    @endif
            @endforeach
        @endif
    </div>
    <div class="my-4 provision">
        @if ($proposal->showprovisions == true)
            <h2>PROVISIONS</h2>
            @foreach ($proposal->provisions as $provision)
                <div class="provision-item">
                    @if ($provision['selected'] == 'Yes')
                        <p>{{ str_replace('_________________', $provision['input_value'], $provision['title']) }}</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <div class="my-4">
        @if ($proposal->showconditions == true)
            <h2>CONDITIONS</h2>
            @foreach ($proposal->conditions as $condition)
                <div class="condition-item">
                    @if ($condition['selected'] == 'Yes')
                        <p>{{ str_replace('_________________', $condition['input_value'], $condition['title']) }}</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
    <div class=" my-4 signatureclass">
        <h3>Agile Courts Construction Company, Inc.</h3>
        <img src="{{ $proposal->signatureData }}" alt="signature" class="signature">
        <p>___________________________</p>
        <p>Signature</p>
    </div>
</div>
<style>
    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    h2 {
        font-weight: bold;
        text-decoration: underline;

    }

    p {
        margin: 0px;
        padding: 0px;
    }

    .logo1 {
        text-align: center;
        margin-right: 20px;
        margin-top: 20px;
    }

    .logo1 img {
        width: 150px;
        height: 200px;
    }

    .logo2 img {
        width: 100%;
        height: 50px;
    }

    .logo2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .logo2 p {
        margin-top: 10px;
        color: green;
        font-size: 15px;
        font-weight: bold;
    }

    .sologan {
        text-align: center;
    }

    .agreement {
        margin-top: 5vh;
        text-align: center;
        margin-bottom: 10px;
    }

    .agreement h2 {
        text-decoration: underline;
        font-weight: bold;
        font-size: 24px;
    }

    .table-content {
        width: 100%;
        max-width: 100%;
        margin: 0 auto;

    }

    .table-content table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid black;
        table-layout: fixed;
    }

    table th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }

    .agreement-page {
        margin: 10px 10px;
        padding: 2px;
        margin-top: 7vh;
        width: 100%;
    }

    .overseas-installation {
        margin-top: 7vh;
    }

    .signature {
        width: 200px;
        height: 50px;
        margin: 0px;
        padding: 0px;
    }
</style>
