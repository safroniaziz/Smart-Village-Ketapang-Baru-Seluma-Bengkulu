<!DOCTYPE html>
<html>
<head>
    <title>Test Update TTD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Test Update TTD</h1>
    
    <form id="testForm">
        <input type="number" id="pengajuanId" placeholder="Pengajuan ID" value="1">
        <select id="jenisTtd">
            <option value="manual">Manual</option>
            <option value="gambar">Gambar</option>
            <option value="qrcode">QR Code</option>
        </select>
        <button type="submit">Update</button>
    </form>
    
    <div id="result"></div>
    
    <script>
        $('#testForm').on('submit', function(e) {
            e.preventDefault();
            
            const pengajuanId = $('#pengajuanId').val();
            const jenisTtd = $('#jenisTtd').val();
            
            $('#result').html('Loading...');
            
            $.ajax({
                url: `/admin/pengajuan-surat/${pengajuanId}/jenis-ttd`,
                method: 'POST',
                data: {
                    jenis_ttd: jenisTtd,
                    _method: 'PATCH',
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#result').html('<div style="color: green">SUCCESS: ' + JSON.stringify(response) + '</div>');
                },
                error: function(xhr) {
                    $('#result').html('<div style="color: red">ERROR ' + xhr.status + ': ' + xhr.responseText + '</div>');
                }
            });
        });
    </script>
</body>
</html>