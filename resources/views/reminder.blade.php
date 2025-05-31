<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Reminder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h4 class="mb-4 text-center text-maroon">Atur Pengingat untuk Beasiswa</h4>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $beasiswa->nama_beasiswa }}</h5>
            <form action="{{ route('reminder.store') }}" method="POST">
                @csrf
                <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">

                <div class="mb-3">
                    <label for="waktu_reminder" class="form-label">Kapan ingin diingatkan?</label>
                    <select name="waktu_reminder" id="waktu_reminder" class="form-select" required>
                        <p class="mb-2">Kapan ingin diingatkan?</p>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waktu_reminder" id="reminder1" value="1" required>
                            <label class="form-check-label" for="reminder1">1 hari sebelum</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waktu_reminder" id="reminder2" value="2">
                            <label class="form-check-label" for="reminder2">2 hari sebelum</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="waktu_reminder" id="reminder_custom" value="custom">
                            <label class="form-check-label" for="reminder_custom">Custom (manual)</label>
                        </div>
                </div>

                <div id="custom-time" class="mb-3" style="display: none;">
                    <label for="custom_datetime" class="form-label">Tanggal & Waktu Custom</label>
                    <input type="datetime-local" name="custom_datetime" id="custom_datetime" class="form-control">
                </div>

                <button type="submit" class="btn btn-maroon">Simpan Reminder</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('waktu_reminder').addEventListener('change', function () {
        const customTime = document.getElementById('custom-time');
        if (this.value === 'custom') {
            customTime.style.display = 'block';
        } else {
            customTime.style.display = 'none';
        }
    });
</script>
</body>
</html>
