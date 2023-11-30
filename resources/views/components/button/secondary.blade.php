<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-secondary-800 border border-secondary-300 dark:border-secondary-500 rounded-md font-semibold text-xs text-secondary-700 dark:text-secondary-300 uppercase tracking-widest shadow-sm hover:bg-secondary-50 dark:hover:bg-secondary-700 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-800 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
