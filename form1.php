<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <script>
        // Simple client-side validation
        function validateForm() {
            const form = document.forms["studentForm"];
            const firstName = form["Firstname"].value;
            const lastName = form["Lastname"].value;
            const gender = form["Gender"].value;
            const classSelect = form["Class"].value;
            const batchSelect = form["Batch"].value;
            const semester = form["semester"].value;

            if (!firstName || !lastName || !gender || !classSelect || !batchSelect || !semester) {
                alert("All fields are required!");
                return false;
            }

            // Validate semester
            if (semester < 1 || semester > 8) {
                alert("Semester must be between 1 and 8.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <form name="studentForm" action="submitForm.php" method="post" onsubmit="return validateForm()">
        <label for="Firstname">First Name:</label>
        <input type="text" name="Firstname" id="Firstname" required><br>

        <label for="Lastname">Last Name:</label>
        <input type="text" name="Lastname" id="Lastname" required><br>

        Gender:  
        <input type="radio" name="Gender" id="Male" value="Male" required>
        <label for="Male">Male</label>
        <input type="radio" name="Gender" id="Female" value="Female" required>
        <label for="Female">Female</label><br>

        <label for="Class">Class:</label>
        <select name="Class" id="Class" required>
            <option value="">Select Class</option>
            <?php
            require 'connect.php';
            $result = mysqli_query($conn, "SELECT ID, name FROM Class");
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . htmlspecialchars($row['ID']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                }
                mysqli_free_result($result);
            } else {
                echo "<option value=''>Error loading classes</option>";
            }
            ?>
        </select><br>

        <label for="semester">Semester:</label>
        <input type="number" name="semester" id="semester" min="1" max="8" required><br>

        <label for="Batch">Batch:</label>
        <select name="Batch" id="Batch" required>
            <option value="">Select Batch</option>
            <?php
            $result = mysqli_query($conn, "SELECT ID, name FROM Batch");
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . htmlspecialchars($row['ID']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                }
                mysqli_free_result($result);
            } else {
                echo "<option value=''>Error loading batches</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
