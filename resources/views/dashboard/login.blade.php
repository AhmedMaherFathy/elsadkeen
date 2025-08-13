<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | تسجيل الدخول</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom styles for the beautiful alert */
        .custom-alert {
            background-color: #fee2e2;
            /* Red-100 */
            border-right: 4px solid #ef4444;
            /* Red-500 */
            color: #b91c1c;
            /* Red-800 */
            padding: 1rem 1.25rem;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: flex-start;
            text-align: right;
            /* Ensure text aligns right for RTL */
        }

        .custom-alert ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .custom-alert li {
            margin-bottom: 0.25rem;
        }

        .custom-alert li:last-child {
            margin-bottom: 0;
        }

        .bg-gradient-to-br1 {
            background-image: linear-gradient(to bottom right, #887925, #36454F);
        }

        .custom-alert-icon {
            margin-left: 0.75rem;
            /* Space between icon and text for RTL */
            font-size: 1.25rem;
            line-height: 1;
        }
    </style>
</head>

<body class="bg-gradient-to-br1 from-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div
        class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md transform transition-all duration-300 hover:scale-105">
        <!-- Logo Area -->
        <div class="mb-8 text-center">
            {{-- You can replace this with an actual image logo --}}
            <img src="{{asset('logo.png')}}" alt="Elsadkeen"
                class="mx-auto mb-4 rounded-lg">
            <h2 class="text-3xl font-extrabold text-gray-800">تسجيل الدخول</h2>
            <p class="text-gray-600 mt-2">أهلاً بك في لوحة التحكم</p>
        </div>

        <!-- Beautiful Alert for Errors -->
        @if ($errors->any())
            <div class="custom-alert" role="alert">
                <div class="custom-alert-icon">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold">حدث خطأ!</p>
                    <ul class="mt-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('dashboard.signin') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد الإلكتروني</label>
                <input type="email" name="email" id="email"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                              transition duration-200 ease-in-out text-right"
                    placeholder="ادخل بريدك الإلكتروني" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">كلمة المرور</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm
                              focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                              transition duration-200 ease-in-out text-right"
                    placeholder="ادخل كلمة المرور" required>
            </div>
                <a href="{{route('dashboard.password.request')}}" class="text-sm text-blue-600 hover:underline ">نسيت كلمة المرور؟</a>

            <div class="flex justify-start"> {{-- Changed to justify-start for RTL button alignment --}}
                <button type="submit" style="background-color: #887925;"
                    class="w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md
                               hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                               transition duration-300 ease-in-out transform hover:scale-105">
                    تسجيل الدخول
                </button>
            </div>
        </form>
    </div>
</body>

</html>
