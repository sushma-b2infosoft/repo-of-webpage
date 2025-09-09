<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Live Search with Highlight</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="search-container">
    <h2>🔍 Live Search</h2>
    <input type="text" id="search" placeholder="Search users, products or tasks...">
    <div id="result"></div>
  </div>

  <script>
    $(document).ready(function(){
      $("#search").on("keyup", function(){
        let keyword = $(this).val();
        if(keyword.length > 0){
          $.ajax({
            url: "search.php",
            type: "POST",
            data: { keyword: keyword },
            success: function(data){
              $("#result").html(data);
            }
          });
        } else {
          $("#result").html("");
        }
      });
    });
  </script>
</body>
</html>
