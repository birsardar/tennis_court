<div>

    <div style="display: flex; align-items: center; justify-content: center;">
        <div style="text-align: left;">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($data['logo1Url'])) }}" alt="logo1">
            <p style="font-weight: bold;">Construction Co</p>
        </div>
        <div style="text-align: center;">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($data['logo2Url'])) }}" alt="logo2">
            <p style="font-weight: bold;">Earth, Wind, and Fire</p>
        </div>
    </div>

    <div style="text-align: center; margin-bottom: 10px;">
        <h2 style="text-decoration: underline; font-weight: bold; font-size: 24px;">Agreement</h2>
    </div>
    <div style="width: 100%; max-width: 600px; margin: 0 auto;">
        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; table-layout: fixed;">
            <colgroup>
                <col style="width: 50%;">
                <col style="width: 50%;">
            </colgroup>
            <thead>
                <tr>
                    <th style="border: 1px solid black; padding: 10px;">WORK TO BE PERFORMED</th>
                    <th style="border: 1px solid black; padding: 10px;">CUSTOMER</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid black; padding: 10px; text-align: center;">
                        {{ $proposal->work_to_be_performed }}</td>
                    <td style="border: 1px solid black; padding: 10px; text-align: center;">Earth, Wind, and Fire</td>
                </tr>
            </tbody>
        </table>
    </div>




</div>
</div>
