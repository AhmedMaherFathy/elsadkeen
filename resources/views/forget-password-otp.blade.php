<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعادة تعيين كلمة المرور</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .accent {
            color: #887925;
        }
        .border-accent {
            border-color: #887925;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-white p-4">
    <div class="p-8 rounded-2xl shadow-2xl w-full max-w-md transition-transform duration-300 hover:scale-[1.02]">
        <div class="text-center mb-10">
            <img src="{{ asset('logo.png') }}" alt="Elsadkeen" class="mx-auto mb-4 w-20 h-20 object-contain rounded-xl">
            <h2 class="text-3xl font-extrabold text-gray-800">إعادة تعيين كلمة المرور</h2>
            <p class="text-gray-600 mt-2">لقد تلقيت هذا البريد الإلكتروني لأننا تلقينا طلبًا لإعادة تعيين كلمة المرور الخاصة بحسابك.</p>
        </div>

        <div class="text-center">
            <p class="text-lg text-gray-700 mb-4">كود التحقق الخاص بك هو:</p>
            <div class="inline-block px-6 py-4 border-2 rounded-xl border-accent">
                <h3 class="text-5xl font-extrabold tracking-widest text-gray-800 accent">
                    {{ $otp }}
                </h3>
            </div>
            <p class="text-gray-600 mt-6 leading-relaxed">
                هذا الكود صالح لمدة <span class="font-semibold accent">5 دقائق</span> فقط.<br>
                إذا لم تطلب إعادة تعيين كلمة المرور، فلا داعي لاتخاذ أي إجراء إضافي.
            </p>
        </div>
    </div>
</body>
</html>
