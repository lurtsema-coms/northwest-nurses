<button {{ $attributes->merge(['type' => 'submit', 'class' => '  text-lg px-4 py-2 bg-cyan-800 border border-transparent rounded-md font-semibold  text-white  uppercase tracking-widest   active:bg-cyan-900 dark:active:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-cyan-700 focus:ring-offset-2 dark:focus:ring-offset-cyan-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
