<x-layout_not_navbar title="{{ $title }}">
    <div class="flex items-center justify-center h-screen">
        <div class="p-3 py-5 mx-3 text-center bg-white rounded-lg shadow-xl md:w-1/2">
            <h1 class="mb-5 text-xl font-bold text-primary md:text-3xl">Verify Your Email Address</h1>

            @if (session('resent'))
                <p class="text-sm italic font-light text-yellow-300">A fresh verification link has been sent to your
                    email
                    address.</p>
            @endif

            <p class="text-sm font-light md:text-base">Before proceeding, please check your email for a verification
                link.</p>
            <p class="text-sm font-semibold md:text-base">If you did not receive the email, klik button for re-send
                email.
            </p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary hover:bg-opacity-90">Resend
                    Verification Email</button>
            </form>
        </div>
    </div>

</x-layout_not_navbar>
