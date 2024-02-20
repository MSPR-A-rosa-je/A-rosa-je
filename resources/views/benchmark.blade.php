@include('admin')

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Benchmarks</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <h1 class="logo"><a href="/home">Benchmarks</a></h1>
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
        <button class="benchmark-btn" data-test="testall">All Benchmark</button>
    </div>
    <div class="bench">
        <button class="clear-btn" id="clear"> CLEAR</button>
    </div>
    <div class="results_container">
        <div class="results" id="results">
            <div class="results_attempt" style="display: none;">
                <div class="dot-spinner">
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '#clear', function() {
            $('#results').empty();
        })
        $(document).ready(function() {
            $('.benchmark-btn').click(function() {
                var testType = $(this).data('test');
                $.ajax({
                    url: '/benchmark/run/' + testType,
                    type: 'GET',
                    beforeSend: function() {
                        $('.results_attempt').show();
                    },
                    success: function(response) {
                        var message = '<strong>Test:</strong> ' + response.test + '<br>' +
                            '<strong>Execution time:</strong> ' + response.executionTime + ' seconds<br>' +
                            '<strong>Results:</strong><br>';
                        $.each(response.results, function(test, result) {
                            var resultString = JSON.stringify(result, null, 2);
                            message += '<strong>' + test + ':</strong><pre>' + resultString + '</pre><br>';
                        });
                        $('#results').html('<div>' + message + '</div>');
                        $('.results_attempt').hide();
                    },
                    error: function(err) {
                        console.error('AJAX ERROR :', err);
                    }
                });
            });
        });
    </script>
</body>
@include('layouts/footer')

</html>
