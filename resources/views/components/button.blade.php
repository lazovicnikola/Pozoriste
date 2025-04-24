<a {{$attributes->merge(['class' => 'bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75'])}} href="{{ $href ?? '#' }}">
  {{$slot}}
</a>
