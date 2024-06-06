@if ($paginator->hasPages())
<div id="pagination" hx-swap-oob="true" class="flex flex-row justify-center items-center lg:max-w-screen-sm gap-3">
  @if ($paginator->onFirstPage())
    <button class="bg-dark opacity-90 text-white py-2 px-5 rounded-full cursor-default">Prev</button>
  @else
    <a href="{{ $paginator->previousPageUrl() }}" class="bg-dark hover:opacity-90 text-white py-2 px-5 rounded-full cursor-pointer">Prev</a>
  @endif
  <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">{{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of {{ $paginator->total() }}</p>
  @if (!$paginator->hasMorePages())
    <button class="bg-dark opacity-90 text-white py-2 px-5 rounded-full cursor-default">Next</button>
  @else
    <a href="{{ $paginator->nextPageUrl() }}" class="bg-dark hover:opacity-90 text-white py-2 px-5 rounded-full cursor-pointer">Next</a>
  @endif
</div>
@endif

