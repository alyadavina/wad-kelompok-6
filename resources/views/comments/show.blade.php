<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Komentar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tweet-box {
            background-color: #f8f9fa;
            border-left: 4px solid maroon;
            padding: 15px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">⬅ Kembali</a>

    <!-- Tampilkan Beasiswa (seperti tweet) -->
    <div class="tweet-box mb-3">
        <h5>{{ $beasiswa->nama_beasiswa }}</h5>
        <p>{{ $beasiswa->deskripsi }}</p>
    </div>

    <!-- Form komentar -->
    <form action="{{ route('comments.store') }}" method="POST" class="mb-4">
        @csrf
        <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">
        <div class="mb-3">
            <textarea name="comment" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
        </div>
        <button type="submit" class="btn btn-maroon">Kirim</button>
    </form>

    <!-- Daftar komentar -->
    <h5>Komentar:</h5>
    @forelse ($comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <strong>{{ $comment->user->nama ?? 'Anonim' }}</strong>
                <small class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small>
                <p class="mb-0">{{ $comment->comment }}</p>
            </div>
        </div>
    @empty
        <p>Belum ada komentar.</p>
    @endforelse
</div>
</body>
</html>
