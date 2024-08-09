<div id="preloader"
    class="fixed top-0 left-0 flex items-center justify-center w-screen h-screen bg-[#eee] z-999999 dark:bg-black">
    <div class="w-16 h-16 border-4 border-solid rounded-full animate-spin border-primary border-t-transparent"></div>
</div>


<script>
    setTimeout(function() {
        const preloader = document.getElementById('preloader');
        if (preloader) {
            preloader.classList.add('hidden');
        }
    }, 500);
</script>
