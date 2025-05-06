<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name','Laravel') }}</title>

  {{-- Alpine (para o toggle de tema) --}}
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js"></script>

  {{-- Aqui entra o Tailwind + seu JS --}}
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>


<body
  x-data="themeSwitcher()" 
  x-init="init()" 
  :class="{ 'dark': theme }"
  class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100"
>
<h1 class="text-3xl font-bold underline">
    </h1>
  <nav class="bg-white dark:bg-gray-800 shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <a href="{{ url('/') }}" class="text-xl font-bold">{{ config('app.name') }}</a>
      <div class="flex items-center space-x-4">
        {{-- toggle --}}
        <button @click="toggle()" class="p-2 rounded bg-gray-200 dark:bg-gray-700">
          <template x-if="!theme">🌙</template>
          <template x-if="theme">☀️</template>
        </button>
        {{-- auth links... --}}
      </div>
    </div>
  </nav>

  <main class="container mx-auto px-4 py-6">
    @yield('content')
  </main>

  <script>
    function themeSwitcher() {
      return {
        theme: localStorage.theme === 'dark',
        init() {
          document.documentElement.classList.toggle('dark', this.theme)
        },
        toggle() {
          this.theme = !this.theme
          localStorage.theme = this.theme ? 'dark' : 'light'
          document.documentElement.classList.toggle('dark', this.theme)
        },
      }
    }
  </script>
</body>
</html>
