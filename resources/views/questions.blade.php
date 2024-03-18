<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Questions</title>
</head>
<body>
    <form id="question-form">
        @foreach($questions as $question)
            <div class="question" data-question-id="{{ $question['id'] }}">
                <p>{{ $question['text'] }}</p>
                <div>
                    <button type="button" class="btn-answer" data-answer="Yes">Sim</button>
                    <button type="button" class="btn-answer" data-answer="No">Nao</button>
                </div>
            </div>
        @endforeach
    </form>
    <div id="next-question"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-answer').off('click');
                $('.btn-answer').click(function() {
                var questionId = $(this).closest('.question').data('question-id');
                var answer = $(this).data('answer');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
                $.ajax({
                    url: '{{ route("questions") }}',
                    method: 'POST',
                    data: {
                        question_id: questionId,
                        answer: answer,
                        _token: csrfToken
                    },
                    success: function(response) {
                        $('#next-question').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
