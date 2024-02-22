@include('back.admin')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Benchmarks</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="bench">
        <button class="benchmark-btn" data-test="test1">Users Benchmark</button>
        <button class="benchmark-btn" data-test="test2">Plants Benchmark</button>
        <button class="benchmark-btn" data-test="test3">Mission Benchmark</button>
    </div>
    <div class="bench">
        <button class="benchmark-btn" data-test="test4">Advice Benchmark</button>
        <button class="benchmark-btn" data-test="test5">Sessions Benchmark</button>
        <button class="benchmark-btn" data-test="test6">Adresses Benchmark</button>
    </div>
    <div class="bench">
        <button class="benchmark-btn" data-test="test7">All Benchmark</button>
    </div>
    <div class="bench">
        <button class="clear-btn" id="clear">CLEAR</button>
    </div>
    <div class="results_container">
        <div class="results" id="results">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.benchmark-btn').click(function() {
                var testType = $(this).data('test');
                $('#results').empty().append('<div class="results_attempt">' +
                    '<div class="dot-spinner">' +
                    '<div class="dot-spinner__dot"></div>' +
                    '<div class="dot-spinner__dot"></div>' +
                    '<div class="dot-spinner__dot"></div>' +
                    '<div class="dot-spinner__dot"></div>' +
                    '<div class="dot-spinner__dot"></div>' +
                    '<div class="dot-spinner__dot"></div>' +
                    '<div class="dot-spinner__dot"></div>' +
                    '<div class="dot-spinner__dot"></div>' +
                    '</div>' +
                    '</div>');
                $.ajax({
                    url: '/benchmark/run/' + testType,
                    type: 'GET',
                    timeout: 999999999,
                    beforeSend: function() {},
                    success: function(response) {
                        var message = '<strong class="innerdiv">Time:</strong><div class="innerdiv test"> ' +
                            response.executionTime + ' seconds</div><br>' +
                            '<strong class="innerdiv">Results:</strong><br>';
                        $.each(response.results, function(test, result) {
                            var resultString = JSON.stringify(result, null, 2);
                            message += '<strong>' + test + ':</strong><pre>' + resultString + '</pre><br>';
                        });
                        $('#results').html('<div>' + message + '</div>');
                    },
                    error: function(err) {
                        console.error('AJAX ERROR :', err);
                        $('#results').text('An error occurred. Please try again.');
                    },
                    complete: function() {
                        $('.results_attempt').remove();
                    }
                });
            });

            $('#clear').click(function() {
                $('#results').empty();
            });
        });
    </script>
</body>
@include('back.layouts.footer')

</html>
