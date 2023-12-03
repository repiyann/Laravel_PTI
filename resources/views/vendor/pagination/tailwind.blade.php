@if($paginator->hasPages())
<div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
    <span class="flex items-center col-span-3">
        Showing {{ ($paginator->currentpage()-1) * $paginator->perpage()+1}} - {{(($paginator->currentpage()-1) * $paginator->perpage())+$paginator->count()}} of {{$paginator->total() }}
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
            <ul class="inline-flex items-center">
                @if($paginator->onFirstPage())
                <li class="px-3">
                    <a href="javascript:void(0)" class="pointer-events-none">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{$paginator->previousPageUrl()}}" class="px-2 py-1 mt-custom inline-block rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                        <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 20 20">
                            <path fill="#9233ea" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
                @endif
                @foreach ($elements as $element)
                @if(is_string($element))
                <li>
                    <a class="pointer-events-none px-3 py-1 rounded-md">
                        {{$element}}
                    </a>
                </li>
                @endif

                @if(is_array($element))
                @foreach ($element as $page=>$url)
                @if($page == $paginator->currentPage())
                <li>
                    <a href="javascript:void(0)" class="pointer-events-none px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple" href="javascript:void(0)">
                        {{$page}}
                    </a>
                </li>
                @else
                <li>
                    <a href="{{$url}}" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        {{$page}}
                    </a>
                </li>
                @endif
                @endforeach
                @endif
                @endforeach

                @if($paginator->hasMorePages())
                <li>
                    <a href="{{$paginator->nextPageUrl()}}" class="px-2 py-1 mt-custom inline-block rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                        <svg class="w-4 h-4" aria-hidden="true" viewBox="0 0 20 20">
                            <path fill="#9233ea" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
                @else
                <li class="px-3">
                    <a href="javascript:void(0)" class="pointer-events-none">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </span>
</div>
@endif