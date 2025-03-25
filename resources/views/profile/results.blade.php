<x-app-layout>

    @if($results === null)
        <div class="mt-9">
            <h2 class="text-center text-2xl">Vous n'avez pas encore de résultat.</h2>
        </div>
    @else
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Quizz Name</th>
                <th>Score</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                        <?php
                              $date = strtotime($result['created_at']);
                              $date = date('d F Y', $date);
                        ?>
                    <td>{{ $date }}</td>
                    <td>{{ $result['title'] }}</td>
                    <td>{{ $result['score'] }}/10</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</x-app-layout>
