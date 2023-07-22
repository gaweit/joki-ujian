$(document).ready(function () {
  var namedBinary;
  var binary;

  $("#callPHP").click(function () {
    $.ajax({
      url: "../AG/callingAG.php",
      dataType: "json",
      success: function (response) {
        console.log(response);
        //Checking if the response is empty or not
        if (
          response.completeArray &&
          Object.keys(response.completeArray).length > 0
        ) {
          var completeArray = response.completeArray;
          console.log(completeArray);
          namedBinary = completeArray;
          // Use the completeArray variable as needed

          // Create a 24-bit binary representation with commas
          var binaryArray = []; // Initialize as an array
          for (var i = 0; i <= 23; i++) {
            if (completeArray[i]) {
              binaryArray.push(1); // Append 1 to the array
            } else {
              binaryArray.push(0); // Append 0 to the array
            }
          }

          binary = binaryArray.join(",");

          console.log(binary);

          // Toggle the table cells based on the binary array
          var rows = $(".schedule-table tbody tr");
          var cellsPerRow = binary.length / rows.length;

          // Remove "active" class from all cells
          $(".schedule-table .toggle").removeClass("active").text("");

          //Activate every toggle
          rows.each(function (rowIndex) {
            var rowCells = $(this).find(".toggle");
            rowCells.each(function (cellIndex) {
              var binaryIndex = rowIndex + cellIndex * rows.length;
              if (binaryArray[binaryIndex] === 1) {
                $(this).addClass("active");
                var value = completeArray[binaryIndex];
                $(this).text(value);
              }
            });
          });
          $("#result").text("Complete Array: " + completeArray);
        } else {
          // Handle the case when the response is empty or incomplete
          alert("Please contact Laboran for unavailable schedule.");
        }
      },
      error: function () {
        alert("An error occurred while calling the PHP file.");
      },
    });
  });
});
