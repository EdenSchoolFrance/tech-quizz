<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quizzes Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($results === null)
                        <div class="mt-9">
                            <h2 class="text-center text-2xl">Vous n'avez pas encore de résultat.</h2>
                        </div>
                    @else
                        <table class="w-full">
                            <thead>
                            <tr>
                                <th class="text-left">ID</th>
                                <th class="text-left">Date</th>
                                <th class="text-left">Quizz Name</th>
                                <th class="text-left">Score</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                        <?php
                                        $date = strtotime($result['created_at']);
                                        $date = date('d F Y', $date);
                                        ?>
                                    <td>{{ $id }} 1</td>
                                    <td>{{ $date }} 04 March 2024</td>
                                    <td>{{ $result['title'] }} Javascript</td>
                                    <td>{{ $result['score'] }} 2/10</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
