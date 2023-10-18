<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Autocomplete Search - Doctors</title>
    <!-- Add any necessary CSS links -->
</head>

<body>
    <div class="search-container">
        <form id="searchForm" action="" method="POST">
            <input id="searchInput" class="form-control" type="text" name="term" placeholder="Search doctors...">
            <button type="submit">Search</button>
        </form>
        <ul id="searchResults" class="search-results"></ul>
    </div>

    <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchForm").on("submit", function(e) {
                e.preventDefault();
                var searchText = $("#searchInput").val();

                if (searchText.length > 0) {
                    $.ajax({
                        url: "DoctorController.php",
                        type: "POST",
                        data: {
                            term: searchText
                        },
                        success: function(data) {
                            displayMatches(JSON.parse(data));
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });

            function displayMatches(matches) {
                const searchResults = $("#searchResults");
                searchResults.empty();

                matches.forEach(match => {
                    const li = $("<li></li>").text(match);
                    searchResults.append(li);
                });
            }
        });
    </script>
</body>

</html>