<div style="margin: 20px;">
    <div class='logo'>
        <div class="logo1">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($data['logo1Url'])) }}" alt="logo1">
        </div>
        <div class="logo2">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($data['logo2Url'])) }}" alt="logo2">
            <p class="sologan">CONSTRUCTION CO</p>
            <p>CELEBRATING OUR 50TH YEAR 1972-2022</p>
            <p>“QUALITY STILL EXISTS”</p>
        </div>
    </div>

    <div class="agreement">
        <h2>Agreement</h2>
    </div>

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

<style>
    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
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
</style>
