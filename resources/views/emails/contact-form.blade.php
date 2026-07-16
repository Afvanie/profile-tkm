<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Kontak Website</title>
</head>
<body style="margin:0; padding:0; background:#f1f5f9; font-family:Arial, sans-serif; color:#0f172a;">

    <div style="max-width:640px; margin:30px auto; background:#ffffff; border-radius:18px; overflow:hidden; border:1px solid #e2e8f0;">

        <div style="background:#1d4ed8; padding:24px;">
            <h1 style="margin:0; color:#ffffff; font-size:22px;">
                Pesan Baru dari Website D-III Teknik Mesin
            </h1>

            <p style="margin:8px 0 0; color:#dbeafe; font-size:14px;">
                Pesan ini dikirim melalui form kontak website.
            </p>
        </div>

        <div style="padding:24px;">

            <p style="margin:0 0 8px; font-size:14px; color:#64748b;">
                Nama Pengirim
            </p>
            <p style="margin:0 0 18px; font-size:16px; font-weight:bold;">
                {{ $contactData['name'] }}
            </p>

            <p style="margin:0 0 8px; font-size:14px; color:#64748b;">
                Email Pengirim
            </p>
            <p style="margin:0 0 18px; font-size:16px; font-weight:bold;">
                {{ $contactData['email'] }}
            </p>

            <p style="margin:0 0 8px; font-size:14px; color:#64748b;">
                Subjek
            </p>
            <p style="margin:0 0 18px; font-size:16px; font-weight:bold;">
                {{ $contactData['subject'] ?? '-' }}
            </p>

            <p style="margin:0 0 8px; font-size:14px; color:#64748b;">
                Isi Pesan
            </p>

            <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:14px; padding:18px; line-height:1.7; font-size:15px;">
                {!! nl2br(e($contactData['message'])) !!}
            </div>

        </div>

        <div style="padding:18px 24px; background:#f8fafc; border-top:1px solid #e2e8f0; font-size:12px; color:#64748b;">
            Email ini dikirim otomatis oleh sistem website Program Studi D-III Teknik Mesin Polinema.
        </div>

    </div>

</body>
</html>